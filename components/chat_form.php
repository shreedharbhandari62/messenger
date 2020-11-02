<form class="chat-form" enctype="multipart/form-data">
				<div class="chat-container">
					<div class="form-input">
						<textarea class="textarea-control" placeholder="Type your message..." id="send-message"></textarea>
					</div><!-- Close form inputs -->
					<div class="form-input">
						<!-- here for="upload-files" in Label and id="upload-files" are same to make them same input-->
						<label for="upload-files" id="upload-label"><i class="fas fa-paperclip fa-uploads"></i><i class="fa fa-file-image fa-uploads"></i></label>
						<input type="file" id="upload-files" class="files-upload" name="send_file">
 					</div><!-- Close form inputs -->
				</div><!-- Close chat-container -->
				<div class="files-error">
					<span class='files-cross-icon'>
						&#x2715;
					</span>
					Please choose valid File!
				</div>
			</form><!-- Close chat-form -->

