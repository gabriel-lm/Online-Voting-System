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

		$return = [];
		$email = Filter::String($_POST['email']);
		// Make sure the user does not exist
		$user_found = User::Find($email);

		if($user_found){
			// User exists
			// We can also check to see it they cand log in.
			$return['error'] = "This email is already being used";
			$return['is_logged_in'] = false;
		} else {
			// User doesn't exist. Add them now.

			//Generating email verification token
			$confirmCode = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789!$/()*';
			$confirmCode = str_shuffle($confirmCode);
			$confirmCode = substr($confirmCode, 0, 10);

			$fname 		= ($_POST['fname']);
			$lname 		= ($_POST['lname']);
			$county 	= ($_POST['county']);
			$addr 		= ($_POST['addr']);
			$cnp 		= ($_POST['cnp']);
			$sn 		= ($_POST['sn']);

			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$addUser = $con->prepare("INSERT INTO users(firstname, lastname, county, address, cnp, series_nr, email, password, confirm_code) VALUES(:fname, :lname, :county, :addr, :cnp, :sn, LOWER(:email), :password, :confirmCode)");
			$addUser->bindParam(':fname', $fname, PDO::PARAM_STR);
			$addUser->bindParam(':lname', $lname, PDO::PARAM_STR);
			$addUser->bindParam(':county', $county, PDO::PARAM_STR);
			$addUser->bindParam(':addr', $addr, PDO::PARAM_STR);
			$addUser->bindParam(':cnp', $cnp, PDO::PARAM_INT);
			$addUser->bindParam(':sn', $sn, PDO::PARAM_STR);
			$addUser->bindParam(':email', $email, PDO::PARAM_STR);
			$addUser->bindParam(':password', $password, PDO::PARAM_STR);
			$addUser->bindParam(':confirmCode', $confirmCode, PDO::PARAM_STR);
			$addUser->execute();

			$user_id = $con->lastInsertId();

			//$_SESSION['user_id'] = (int) $user_id;

			$mail = new PHPMailer(true);                          // Passing `true` enables exceptions
			
		    //Server settings
		    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication

		    //Recipients
		    $mail->setFrom('donotreplay@voteonline.com', 'VoteOnline');
		    $mail->addAddress($email, $fname);     				// Add a recipient

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = "Your VoteOnline account: Email address verification";
		    $mail->Body    = "You have been registered! <br></br>
		    	Please verify your email address by clicking the link below: <br></br>
		    	<a href='http://loginphpsite/confirm.php?email=$email&confirmCode=$confirmCode'>Click here!</a>";
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    $mail->smtpClose();

			//UIkit.notification('You have been registered! Please check your email for confirmation!');
			$return['redirect'] = '/login.php?message=confirm-email-first';
			//$return['is_logged_in'] = true;

			//echo "Please Check Your Email Before Logging In!";
			//echo "<script>setTimeout(\"location.href = '/login.php';\",1500);</script>";
		}
		//Make sure the user CAN be added AND is added

		//Return the propper information  back to JavaScript to redirect us.

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	}else {
		//Die. Kill the script. Redirect the user.
		exit('Invalid URL');
	}
?>