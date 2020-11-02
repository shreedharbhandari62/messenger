<?php
include '../init.php';

$obj =  new base_class;

if (isset($_FILES['send_file']['name'])){
	$file_name = $_FILES['send_file']['name'];
	$tmp_name = $_FILES['send_file']['tmp_name'];
	$store_files= "../assets/img/";
	$extensions = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG', 'pdf', 'zip', 'docx', 'xlsx');
	$get_file_extension = explode(".", $file_name);
	$get_extension = end($get_file_extension);

	if (!in_array($get_extension, $extensions)) {
		echo "error";
	}else{
		$user_id = $_SESSION['user_id'];
		move_uploaded_file($tmp_name, $store_files.'/'.$file_name );
		if ($obj->Normal_Query("INSERT INTO messages(message, msg_type, user_id) VALUES(?, ?, ?)", [$file_name, $get_extension, $user_id])) {
			echo "success";
		}
	}
}
?>