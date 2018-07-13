<?php
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once('E:\Learning\PHP Login Udemy\inc\config.php');

	Page::ForcedLogin();

	//$user_id = $_SESSION['user_id'];

	$User = new User($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Dashboard</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="robots" content="follow">
	</head>
	<body>
		<div class="uk-section uk-container">
			<h2>Dashboard</h2>
			<p>Hello <?php echo $User->email; ?>, you registered at <?php echo $User->reg_time; ?></p>
			<p><a href="/logout.php">Logout</a></p>
		</div>
		<?php require_once('E:\Learning\PHP Login Udemy\inc\footer.php'); ?>
	</body>
</html>