<?php
include 'init.php';

if (!isset($_SESSION['user_id'])):
	header("location:login.php");
?>

<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Home</title>
	
	<?php include 'components/css.php'; ?>

	
</head>
<body>

	<?php if(isset($_SESSION['loader'])): ?>

	<div class="loader-area">
		<div class="loader">
			<div class="loader-item"></div>
			
		</div><!-- close loader -->
		
	</div><!-- close loader area -->

		<?php endif; ?>

	
		<?php unset($_SESSION['loader']); ?>

	<?php
	if (isset($_SESSION['password_updated'])):
	?>
	<div class="flash success-flash">
		<span class="remove">&times;</span>
		<div class="flash-heading">
			<h3><span class="checked">&#10004; </span> Success: you have done!</h3>
		</div>
		<div class="flash-body">
			<p><?php echo $_SESSION['password_updated'];  ?></p>
			
		</div>
	</div><!-- close flash -->
	<?php endif; ?>

	<?php unset($_SESSION['password_updated']); ?>



	<?php
	if (isset($_SESSION['name_updated'])):
	?>
	<div class="flash success-flash">
		<span class="remove">&times;</span>
		<div class="flash-heading">
			<h3><span class="checked">&#10004; </span> Success: you have done!</h3>
		</div>
		<div class="flash-body">
			<p><?php echo $_SESSION['name_updated'];  ?></p>
			
		</div>
	</div><!-- close flash -->
	<?php endif; ?>

	<?php unset($_SESSION['name_updated']); ?>



	<?php
	if (isset($_SESSION['photo_updated'])):
	?>
	<div class="flash success-flash">
		<span class="remove">&times;</span>
		<div class="flash-heading">
			<h3><span class="checked">&#10004; </span> Success: you have done!</h3>
		</div>
		<div class="flash-body">
			<p><?php echo $_SESSION['photo_updated'];  ?></p>
			
		</div>
	</div><!-- close flash -->
	<?php endif; ?>

	
	<?php unset($_SESSION['photo_updated']); ?>

	
	
	

	<!-- <div class="flash error-flash">
		<span class="remove">&times;</span>
		<div class="flash-heading">
			<h3><span class="cross">&#x2715; </span> Error: you have error!</h3>
		</div>
		<div class="flash-body">
			<p>First you need to login</p>
			
		</div>
	</div> -->
	<!-- close flash -->

	
	<?php include 'components/nav.php'; ?>
	

	<div class="chat-container">
		<?php include 'components/sidebar.php'; ?>

		<section id="right-area">

			
			<?php include 'components/messages.php'; ?>

			<?php include 'components/chat_form.php'; ?>
			
			<?php include 'components/emoji.php'; ?>
		</section><!-- Close right-area -->
		
	</div><!-- Close chat container -->


	
	<?php include 'components/js.php'; ?>	
	<script type="text/javascript">
		$(document).ready(function() {
			$(".loader-area").show();
			setTimeout(function(){
				$(".loader-area").hide();
			},3000)
		})
	</script>
	
</body>
</html>