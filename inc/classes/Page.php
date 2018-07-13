<?php
	// If there is no constant defined called __CONFIG__, do not load this file 
	if(!defined('__CONFIG__')) {
		exit('You do not have a config file');
	}

 /**
 * 
 */
 class Page
 {
 	// Force user to login.
	static function ForcedLogin(){
		if(isset($_SESSION['user_id'])){
			// User is allowed on this page
		} else{
			// The user is not allowed on this page
			header("Location: /login.php"); exit;
		}
	}
	// If the user is logged in he cannot access the Login page again.
	static function ForcedDash() {
		if(isset($_SESSION['user_id'])){
			// User is allowed on this page
			header("Location: /dashboard.php"); exit;
		} else{
			// The user is not allowed on this page
		}
	}
 }

?>