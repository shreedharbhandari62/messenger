<?php

if (!isset($_SESSION['user_id'])) {

	$obj = new base_class;
	$obj->Create_Session("security","Fisrt you need to login");
	header("location:login.php");
}
?>