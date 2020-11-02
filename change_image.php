 <?php
	include 'init.php';

	include 'security.php';

	$obj =  new base_class;

	if (isset($_POST['change_image'])) {
	 	$img_name = $obj->security($_FILES['change_img']['name']);
		$img_tmp = $_FILES['change_img']['tmp_name'];

		$img_path = "assets/img/";
		$extensions = array('jpg', 'jpeg', 'png', 'JPG','JPEG','PNG');
		$img_ext = explode(".", $img_name);
		$img_extension = end($img_ext);



	 	if (empty($img_name)) {
	 		$img_error = "Please choose the image"; 	 		
	 	}else if (!in_array($img_extension, $extensions)) {
			$img_error = "Invalid image extension!";
		}else{
			move_uploaded_file($img_tmp, $img_path.'/'.$img_name );
			$user_id = $_SESSION['user_id'];
	 		
			if ($obj->Normal_Query("UPDATE users SET image = ? WHERE id = ?", [$img_name, $user_id])) {

				$obj->Create_Session("user_image", $img_name);
				$obj->Create_Session("photo_updated","Your photo is successfully updated");

				header("location:index.php");

			}
		}
	 			
	 		
	} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Home</title>
	<?php include 'components/css.php'; ?>
</head>
<body>


	<?php include 'components/nav.php'; ?>

	<div class="chat-container">

		<?php include 'components/sidebar.php'; ?>
		
		<section id="right-area">
			<?php include 'components/change_image_form.php'; ?>

		</section><!-- Close right-area -->
		
	</div><!-- Close chat container -->

	<?php include 'components/js.php'; ?>
	
</body>
</html>