<div class="form-section">
				<div class="form-grid">
					<form method="POST" action="">

					<div class="group">
						<h2 class="form-heading">Change Name</h2>
					</div>

					<div class="group">
						<input type="text" name="user_name" class="control" placeholder="Enter New Name.." value="<?php echo $_SESSION['user_name']; ?>">

						<div class="user_name-error error">
							<?php 
								if (isset($user_name_error)):
							?>

							<?php echo $user_name_error; ?>

						<?php endif; ?>
						</div>
					</div>

					

					<div class="group">
						<input type="submit" name="change_name" class="btn account-btn" value="Save Changes">
					</div>

					

					
				</form>
				</div><!-- Close Form Grid -->
				
			</div><!-- Close Form Section -->