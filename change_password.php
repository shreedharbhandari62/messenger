<?php
	include 'init.php';

	include 'security.php';

	$obj =  new base_class;

	if (isset($_POST['change_password'])) {
	 	$current_password = $obj->security($_POST['current_password']);
	 	$new_password =  $obj->security($_POST['new_password']);
	 	$retype_password = $obj->security($_POST['retype_password']);

	 	$current_status = $new_status = $retype_status = 1;

	 	if (empty($current_password)) {
	 		$current_password_error = "Current password is required"; 
	 		$current_status="";
	 	}

	 	if (empty($new_password)) {
	 		$new_password_error = "New password is required"; 
	 		$new_status="";
	 	}else if (strlen($new_password) < 5){
	 		$new_password_error = "New password must be at least 5 charracter"; 
	 		$new_status="";
	 	}

	 	if (empty($retype_password)) {
	 		$retype_password_error = "Retype password is required"; 
	 		$retype_status="";
	 	}else if ($new_password != $retype_password) {
	 		$retype_password_error = " New and Retype password doesn't match"; 
	 		$retype_status="";
	 	}

	 	if (!empty($new_status)&&!empty($current_status)&&!empty($retype_status)) {

	 		$user_id = $_SESSION['user_id'];
	 		if ($obj->Normal_Query("SELECT password FROM users WHERE id = ?", [$user_id])) {

	 			$row = $obj->Single_Result();
	 			$db_password = $row->password;
	 			if (password_verify($current_password, $db_password)) {
	 				if ($obj->Normal_Query("UPDATE users SET password = ? WHERE id = ?", [password_hash($new_password, PASSWORD_DEFAULT), $user_id])) {

	 					$obj->Create_Session("password_updated","Your password is successfully updated");

	 					header("location:index.php");

	 				}
	 				
	 			}else{
	 				$current_password_error = "Your current password is incorrect"; 
	 			}
	 			
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
			<?php include 'components/change_password_form.php'; ?>
			

		</section><!-- Close right-area -->
		
	</div><!-- Close chat container -->
	
	<?php include 'components/js.php'; ?>
</body>
</html>