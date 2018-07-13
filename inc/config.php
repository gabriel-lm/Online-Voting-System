<?php
	// If there is no constant defined called __CONFIG__, do not load this file;
	if(!defined('__CONFIG__')){
		exit('You do not have a config file');
	};
	//Sessions always on
	if(!isset($_SESSION)){
		session_start();
	}

	// Our config is bellow
	// Allow all errors
	error_reporting(-1);
	ini_set('display_errors', 'On');

	// Include the class files;
	include_once('classes\DB.php');
	include_once('classes\Filter.php');
	include_once('classes\Page.php');
	include_once('classes\User.php');

	//Mailer classes
	include_once('classes\mailer\PHPMailer.php');
	include_once('classes\mailer\Exception.php');
	include_once('classes\mailer\SMTP.php');
	
	//include_once('functions.php');

	$con = DB::getConnection();
?>
