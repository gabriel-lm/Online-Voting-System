<?php
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once('E:\Learning\PHP Login Udemy\inc\config.php');
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Home</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="robots" content="follow">
	</head>

	<body>
		<div class="uk-section uk-container">
			<?php echo "Hello World! Today is: ";
				echo date("d m Y");
			?> <br />
			<p>
				<a href=".\login.php">Login</a>
				<a href=".\register.php">Register</a>
			</p>
		</div>
		<?php require_once('E:\Learning\PHP Login Udemy\inc\footer.php'); ?>
	</body>
</html>