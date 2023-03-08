<?php
	session_start();
	session_destroy();
	header('location: login.php'); //If the user Logs out they are redirected to the login screen.
?>