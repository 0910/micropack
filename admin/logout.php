<?php
	// iniciamos session
	session_start();
	
	session_unset();
	session_destroy();	
	header('Location: login.php?successmsg=Succesfully logged out');
	die;
?>