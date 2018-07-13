<?php
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once('E:\Learning\PHP Login Udemy\inc\config.php');

	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\PHPMailer;

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Always return JSON format
		//header('Content-Type: application/json');

		$return 	= [];
		$email 		= Filter::String($_POST['email']);
		// Make sure the user does exist
		$user_found 	= User::Find($email, true);

		if($user_found){
			//Password Reset Token
			$token = User::GenerateCode();
			$passReset = $con->prepare("INSERT INTO users(confirm_code) VALUES(:token) WHERE email='$email'");
			$passReset->bindParam(':confirmCode', $token, PDO::PARAM_STR);
			$passReset->execute();

			$mail = new PHPMailer(true);                          // Passing `true` enables exceptions
			
		    //Server settings
		    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication

		    //Recipients
		    $mail->setFrom('donotreplay@voteonline.com', 'VoteOnline');
		    $mail->addAddress($email, 'bob');     				// Add a recipient

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = "VoteOnline Account Recovery";
		    $mail->Body    = "Your account has been found. <br></br>
		    	Please click the link bellow to set a new account password: <br></br>
		    	<a href='http://loginphpsite/confirm.php?email=$email&token=$token'>Click here!</a>";
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    $mail->smtpClose();

		    return['redirect'] = '/login.php';
		} else {
			$return['error'] = 'There is no account matching this email.';
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	}else {
		//Die. Kill the script. Redirect the user.
		exit('Invalid URL');
	}
?>