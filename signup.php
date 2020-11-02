<?php
include "init.php";
$obj = new base_class;
if (isset($_POST['signup'])) {
	$full_name = $obj->security($_POST['full_name']);
	$email = $obj->security($_POST['email']);
	$password = $obj->security($_POST['password']);
	$img_name = $obj->security($_FILES['img']['name']);
	$img_tmp = $_FILES['img']['tmp_name'];
	$name_status = $email_status = $password_status = $photo_status = 1;

	$img_path = "assets/img/";
	$extensions = array('jpg', 'jpeg', 'png', 'JPG','JPEG','PNG');
	$img_ext = explode(".", $img_name);
	$img_extension = end($img_ext);
	//echo $img_extension;



	// Full name validation

	if (empty($full_name)) {
		$name_error = "Full name is required!";
		$name_status = "";
	}

	// Email validation

	if (empty($email)) {
		$email_error = "Email is required!";
		$email_status = "";
	}else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email_error = "Invalid Email Format!";
			$email_status = "";
		}else{
			if($obj->Normal_Query("SELECT email FROM users WHERE email = ?", array($email))){
				if ($obj->Count_Rows() == 0) {
					
				}else{
					$email_error = "Email alredy exists!!";
					$email_status = "";
				}
			}
		}
	}


	// Password validation

	if (empty($password)) {
		$password_error = "Password is required!";
		$password_status = "";
	}else if (strlen($password) < 5) {
		$password_error = "Password is too short! At least 5 letters";
		$password_status = "";
	}

	// Image validation

	if (empty($img_name)) {
		$image_error = "Image is required!";
		$photo_status = "";
	}else if (!in_array($img_extension, $extensions)) {
		$image_error = "Invalid image extension!";
		$photo_status = "";
	}


	//Submlit Form
	if (!empty($name_status)&&!empty($email_status)&&!empty($password_status)&&!empty($photo_status)) {
	 	
	 	move_uploaded_file($img_tmp, $img_path.'/'.$img_name );

	 	$status = 0;
	 	$clean_status = 0;
		if($obj->Normal_Query("INSERT INTO users (name, email, password, image, status, clean_status) VALUES(?,?,?,?,?,?)", [$full_name, $email, password_hash($password, PASSWORD_DEFAULT), $img_name, $status, $clean_status])){
			$obj->Create_Session("account_success","Your account is successfully created");
			header("location:login.php");
			
		}

	 } 

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Create new Account</title>
	<?php include'components/css.php'; ?>
	
</head>
<body>
	<div class="signup-container">
		<div class="account-left">
			<div class="account-text">
				<h1>Lets Chat!!!</h1>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat id officiis, molestiae ratione sunt eius voluptates reiciendis nemo maxime modi odit sit, unde cupiditate vero, incidunt veritatis nesciunt voluptatibus corrupti.</p>
				
			</div><!-- close  account text -->
			
		</div><!-- close  account left -->

		<div class="account-right">
			
			<?php include'components/signup_form.php'; ?>

			
		</div><!-- close  account right -->
		
	</div> <!-- close  signup-container -->

	<?php include'components/js.php'; ?>
	<script type="text/javascript" src="assets/js/file_label.js"></script>

</body>
</html>
