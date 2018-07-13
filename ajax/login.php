<?php
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once('E:\Learning\PHP Login Udemy\inc\config.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Always return JSON format
		//header('Content-Type: application/json');

		$return 	= [];

		$email 		= Filter::String($_POST['email']);
		$password 	= $_POST['password'];

		// Make sure the user does exist
		$user_found 	= User::Find($email, true);

		if($user_found){
			// User exists, sign them in
			$user_id 	= (int) $user_found['user_id'];
			$hash 		= (string) $user_found['password'];
			$confirmed 	= (int) $user_found['confirmed'];


			if(password_verify($password, $hash) && $confirmed){
				// User is signed in
				$return['redirect'] = '/dashboard.php?message=welcome-back';
				$_SESSION['user_id'] = $user_id;
			} else if (!$confirmed) {
				// User did not confirm email account
				$return['error'] = 'You need to confirm your email befor you can log in!';
			} else {
				// Wrong email or password.
				$return['error'] = 'Wrong email or password.';
			}
		} else {
			//Ask them to make an account
			$return['error'] = 'You do not have an account. <a href="/register.php">Click here to create an account </a>';
		}
		//Return the propper information  back to JavaScript to redirect us.

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	}else {
		//Die. Kill the script. Redirect the user.
		exit('invalid URL');
	}	
?>