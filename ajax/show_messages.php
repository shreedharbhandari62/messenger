<?php

include '../init.php';

$obj = new base_class;

if (isset($_GET['message'])) {

	$user_id = $_SESSION['user_id'];

	if ($obj->Normal_Query("SELECT clean_message_id FROM clean WHERE clean_user_id = ?", [$user_id])) {
		
		$last_msg_row = $obj->Single_Result();
		$last_msg_id = $last_msg_row->clean_message_id;

		$obj->Normal_Query("SELECT msg_id FROM messages ORDER BY msg_id DESC LIMIT 1");
		$msg_row = $obj->Single_Result();
		$msg_table_id = $msg_row->msg_id;

		$obj->Normal_Query("SELECT * from messages INNER JOIN users ON messages.user_id = users.id WHERE messages.msg_id BETWEEN $last_msg_id AND $msg_table_id ORDER BY messages.msg_id ASC");

		if ($obj->Count_Rows() == 0) {
			echo "<p class='clean-message'>Start Conversation</p>";
		}else{

			$messages_row = $obj->Fetch_All();

			foreach ($messages_row as $informations):


				// echo '<pre>';
				// print_r($informations);
				// echo '</pre>';


				$full_name = ucwords($informations->name);
				$user_image = $informations->image;
				$user_status = $informations->status;
				

				$message = $informations->message;
				$msg_type = $informations->msg_type;
				$db_user_id = $informations->user_id;
				$msg_time = $obj->time_ago($informations->msg_time);

				if ($user_status == 0) {
					$user_online_status = '<span class="offline-icon"></span>';
				} else {
					$user_online_status = '<span class="online-icon"></span>';

				}

				if ($db_user_id == $user_id) {
					// right user sender message

					if ($msg_type == "text") {

						echo '<div class="right-message common-margin">
					<div class="right-msg-area">
						<span class="date-time right-time ">
							<span class = "send-msg">&#10004;</span>	'.$msg_time.'
							</span><!-- Close date and time-->
						<div class="right-msg">
							<p>'.$message.'</p>
						</div>	
					</div><!-- Close right msg area -->
				</div><!-- Close right messages -->';
						
					}else if ($msg_type == "jpg" || $msg_type == "JPG" || $msg_type == "JPEG" || $msg_type == "jpeg") {
						
						echo '<div class="right-message common-margin">
					<div class="right-msg-area">
						<span class="date-time right-time right-message-time">
								<span class = "send-msg">&#10004;</span>'.$msg_time.'
							</span><!-- Close date and time-->
						<div class="right-files">
							<img src="assets/img/'.$message.'" class = "common-images">
						</div>	
					</div><!-- Close right msg area -->
					</div><!-- Close right messages -->';

					}else if ($msg_type == "PNG" || $msg_type == "png") {

						echo '<div class="right-message common-margin">
					<div class="right-msg-area">
						<span class="date-time right-time right-message-time">
								<span class = "send-msg">&#10004;</span>'.$msg_time.'
							</span><!-- Close date and time-->
						<div class="right-files">
							<img src="assets/img/'.$message.'" class = "common-images">
						</div>	
					</div><!-- Close right msg area -->
					</div><!-- Close right messages -->';

					}else if($msg_type == "zip" || $msg_type == "ZIP"){

						echo '<div class="right-message common-margin">
					<div class="right-msg-area">
						<span class="date-time right-time right-message-time">
								<span class = "send-msg">&#10004;</span>'.$msg_time.'
							</span><!-- Close date and time-->
						<div class="right-files">
							<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-arrow-circle-down files-common"></i>'.$message.'</a>
						</div>	
					</div><!-- Close right msg area -->
					</div><!-- Close right messages -->';

					}else if($msg_type == "pdf" || $msg_type == "PDF"){

						echo '<div class="right-message common-margin">
					<div class="right-msg-area">
						<span class="date-time right-time right-message-time">
								<span class = "send-msg">&#10004;</span>'.$msg_time.'
							</span><!-- Close date and time-->
						<div class="right-files">
							<a href="assets/img/'.$message.'" class="all-files" target="_blank"><i class="fas fa-file-pdf files-common pdf"></i>'.$message.'</a>
						</div>	
					</div><!-- Close right msg area -->
					</div><!-- Close right messages -->';


					}else if($msg_type == "emoji"){

						echo '<div class="right-message common-margin">
					<div class="right-msg-area">
						<span class="date-time right-time right-message-time">
								<span class = "send-msg">&#10004;</span>'.$msg_time.'
							</span><!-- Close date and time-->
						<div class="right-files">

							<img src="'.$message.'" class = "animated-emoji">
						</div>	
					</div><!-- Close right msg area -->
					</div><!-- Close right messages -->';

					}else if($msg_type == "DOCX" || $msg_type == "docx"){

						echo '<div class="right-message common-margin">
					<div class="right-msg-area">
						<span class="date-time right-time right-message-time">
								<span class = "send-msg">&#10004;</span>'.$msg_time.'
							</span><!-- Close date and time-->
						<div class="right-files">
							<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-file-word files-common word"></i>'.$message.'</a>
						</div>	
					</div><!-- Close right msg area -->
					</div><!-- Close right messages -->';

					}else if($msg_type == "xlsx" || $msg_type == "XLSX"){

						echo '<div class="right-message common-margin">
					<div class="right-msg-area">
						<span class="date-time right-time right-message-time">
								<span class = "send-msg">&#10004;</span>'.$msg_time.'
							</span><!-- Close date and time-->
						<div class="right-files">
							<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-file-excel files-common word"></i>'.$message.'</a>
						</div>	
					</div><!-- Close right msg area -->
					</div><!-- Close right messages -->';

					}
				 	
				 }else{
				 	// left user's messages

				 	if ($msg_type == "text") {

				 		echo '<div class="left-message common-margin">

					<div class="sender-img-block">
						<img src="assets/img/'.$user_image.'" class="sender-img">
						'.$user_online_status.'
					</div><!-- Close sender img block -->

					<div class="left-msg-area">
						<div class="user-name-date">
							<span class="sender-name">			'.$full_name.'				
							</span><!-- Close sendername -->

							<span class="date-time">
								'.$msg_time.'
							</span><!-- Close date and time-->
						</div><!-- Close username and date -->

						<div class="left-msg">
							<p>'.$message.'</p>
						</div><!-- Close left-mesg -->
					</div><!-- Close left-message area -->
					
				</div><!-- Close left messages -->';
						
					}else if ($msg_type == "jpg" || $msg_type == "JPG" || $msg_type == "JPEG" || $msg_type == "jpeg") {

						echo '<div class="left-message common-margin">

					<div class="sender-img-block">
						<img src="assets/img/'.$user_image.'" class="sender-img">
						'.$user_online_status.'
					</div><!-- Close sender img block -->

					<div class="left-msg-area">
						<div class="user-name-date">
							<span class="sender-name">			'.$full_name.'				
							</span><!-- Close sendername -->

							<span class="date-time">
								'.$msg_time.'
							</span><!-- Close date and time-->
						</div><!-- Close username and date -->

						<div class="left-files">
							<img src="assets/img/'.$message.'" class = "common-images">
						</div><!-- Close left-mesg -->
					</div><!-- Close left-message area -->
					
				</div><!-- Close left messages -->';
						
					}else if ($msg_type == "PNG" || $msg_type == "png") {

						echo '<div class="left-message common-margin">

					<div class="sender-img-block">
						<img src="assets/img/'.$user_image.'" class="sender-img">
						'.$user_online_status.'
					</div><!-- Close sender img block -->

					<div class="left-msg-area">
						<div class="user-name-date">
							<span class="sender-name">			'.$full_name.'				
							</span><!-- Close sendername -->

							<span class="date-time">
								'.$msg_time.'
							</span><!-- Close date and time-->
						</div><!-- Close username and date -->

						<div class="left-files">
							<img src="assets/img/'.$message.'" class = "common-images">
						</div><!-- Close left-mesg -->
					</div><!-- Close left-message area -->
					
				</div><!-- Close left messages -->';

					}else if($msg_type == "zip" || $msg_type == "ZIP"){

						echo '<div class="left-message common-margin">

					<div class="sender-img-block">
						<img src="assets/img/'.$user_image.'" class="sender-img">
						'.$user_online_status.'
					</div><!-- Close sender img block -->

					<div class="left-msg-area">
						<div class="user-name-date">
							<span class="sender-name">			'.$full_name.'				
							</span><!-- Close sendername -->

							<span class="date-time">
								'.$msg_time.'
							</span><!-- Close date and time-->
						</div><!-- Close username and date -->

						<div class="left-files">
							
							<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-arrow-circle-down files-common"></i>'.$message.'</a>

						</div><!-- Close left-mesg -->
					</div><!-- Close left-message area -->
					
				</div><!-- Close left messages -->';

					}else if($msg_type == "pdf" || $msg_type == "PDF"){

						echo '<div class="left-message common-margin">

					<div class="sender-img-block">
						<img src="assets/img/'.$user_image.'" class="sender-img">
						'.$user_online_status.'
					</div><!-- Close sender img block -->

					<div class="left-msg-area">
						<div class="user-name-date">
							<span class="sender-name">			'.$full_name.'				
							</span><!-- Close sendername -->

							<span class="date-time">
								'.$msg_time.'
							</span><!-- Close date and time-->
						</div><!-- Close username and date -->

						<div class="left-files">
							
							<a href="assets/img/'.$message.'" class="all-files" target="_blank"><i class="fas fa-file-pdf pdf files-common"></i>'.$message.'</a>

						</div><!-- Close left-mesg -->
					</div><!-- Close left-message area -->
					
				</div><!-- Close left messages -->';

					}else if($msg_type == "emoji"){

						echo '<div class="left-message common-margin">

					<div class="sender-img-block">
						<img src="assets/img/'.$user_image.'" class="sender-img">
						'.$user_online_status.'
					</div><!-- Close sender img block -->

					<div class="left-msg-area">
						<div class="user-name-date">
							<span class="sender-name">			'.$full_name.'				
							</span><!-- Close sendername -->

							<span class="date-time">
								'.$msg_time.'
							</span><!-- Close date and time-->
						</div><!-- Close username and date -->

						<div class="left-files">
							
							<img src="'.$message.'" class = "animated-emoji">

						</div><!-- Close left-mesg -->
					</div><!-- Close left-message area -->
					
				</div><!-- Close left messages -->';

					}else if($msg_type == "DOCX" || $msg_type == "docx"){

						echo '<div class="left-message common-margin">

					<div class="sender-img-block">
						<img src="assets/img/'.$user_image.'" class="sender-img">
						'.$user_online_status.'
					</div><!-- Close sender img block -->

					<div class="left-msg-area">
						<div class="user-name-date">
							<span class="sender-name">			'.$full_name.'				
							</span><!-- Close sendername -->

							<span class="date-time">
								'.$msg_time.'
							</span><!-- Close date and time-->
						</div><!-- Close username and date -->

						<div class="left-files">
							
							<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-file-word word files-common"></i>'.$message.'</a>

						</div><!-- Close left-mesg -->
					</div><!-- Close left-message area -->
					
				</div><!-- Close left messages -->';

					}else if($msg_type == "xlsx" || $msg_type == "XLSX"){

						echo '<div class="left-message common-margin">

					<div class="sender-img-block">
						<img src="assets/img/'.$user_image.'" class="sender-img">
						'.$user_online_status.'
					</div><!-- Close sender img block -->

					<div class="left-msg-area">
						<div class="user-name-date">
							<span class="sender-name">			'.$full_name.'				
							</span><!-- Close sendername -->

							<span class="date-time">
								'.$msg_time.'
							</span><!-- Close date and time-->
						</div><!-- Close username and date -->

						<div class="left-files">
							
							<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-file-excel word files-common"></i>'.$message.'</a>

						</div><!-- Close left-mesg -->
					</div><!-- Close left-message area -->
					
				</div><!-- Close left messages -->';

					}

				 } 
			endforeach;

		}

		



	}


 		



}


?>

