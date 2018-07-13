<?php
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once('E:\Learning\PHP Login Udemy\inc\config.php');

	Page::ForcedDash();
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="robots" content="follow">
	</head>
	<body>
		<div class="uk-section uk-container">
			<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">

				<form class="uk-form-stacked js-login">
					<h2>Login</h2>
					<div class="uk-margin">
				        <label class="uk-form-lable" for="form-stacked-text">Email</label>
				        <div class="uk-form-controls">
				        	<input class="uk-input" type="email" name="" id="email" autocomplete="email" required="required" placeholder="email@email.com" autofocus="on" />
				        </div>
				    </div>

				    <div class="uk-margin">
				        <label class="uk-form-lable" for="form-stacked-text">Password</label>
				        <div class="uk-form-controls">
				        	<input class="uk-input"	type="password" name="" id="pass" autocomplete="password" required="required" placeholder="Your Password" />
				        </div>
				    </div>

					<div class="uk-margin uk-alert uk-alert-danger js-error" style="display: none;"></div>

			        <div class="uk-margin">
			        	<button class="uk-button uk-button-default" type="submit">Log In</button>
			        </div>
				</form>
			</div>
		</div>
		<?php require_once('E:\Learning\PHP Login Udemy\inc\footer.php'); ?>
	</body>
</html>