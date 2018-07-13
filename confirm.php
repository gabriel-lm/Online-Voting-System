<?php
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once('E:\Learning\PHP Login Udemy\inc\config.php');

	$return[] = '';

	if(!isset($_GET['email']) || !isset($_GET['confirmCode'])){
		$return['redirect'] = '/register.php';
		exit();
	} else {
		$email = (string) Filter::String($_GET['email']);
		$confirmCode = (string) ($_GET['confirmCode']);
		$user_found = User::Find($email);

		$confirmUser = $con->query("SELECT user_id FROM users WHERE email='$email' AND confirm_code='$confirmCode' 
			AND confirmed=0");

		if ($user_found){
			// User found. Confirm email. Redirect to dashboard.
			$confirmUser = $con->query("UPDATE users SET confirmed=1, confirm_code='' WHERE email='$email'");
			//$confirmUser->bindParam(':co', $fname, PDO::PARAM_STR);
			//$confirmUser->execute();
			$return['redirect'] = '/dashboard?message=welcome';
		} else {
			// Did not find user. Redirect to register
			$return['redirect'] = '/register.php?message=please_register_first';
		}
	}
	//echo 'Your email has been verified!';
	echo json_encode($return, JSON_PRETTY_PRINT); exit;
?>