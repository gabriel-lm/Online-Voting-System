<?php
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once('E:\Learning\PHP Login Udemy\inc\config.php');
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Forgot Password</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="robots" content="follow">
	</head>
	<body>
		<div class="uk-section uk-container">
			<h2>Forgot Password</h2>
			<p class="uk-text-small uk-text-left@s">Please enter your email address and you will receave instructions to recover your account.</p>
			<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">
				<form class="uk-form-stacked js-passreset">
					<div class="uk-margin">
				        <label class="uk-form-lable" for="form-stacked-text">Email</label>
				        <div class="uk-form-controls">
				        	<input class="uk-input" type="email" name="" id="email" autocomplete="email" required="required" placeholder="email@email.com" autofocus="on" />
				        </div>
				    </div>
				    <div class="uk-margin">
			        	<button class="uk-button uk-button-default" type="submit">Submit</button>
			        </div>
				</form>
			</div>
		</div>
		<?php require_once('E:\Learning\PHP Login Udemy\inc\footer.php'); ?>
	</body>
</html>