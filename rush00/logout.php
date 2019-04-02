<?php

	require_once('auth.php');
	session_start();

	if ($_POST['logout-submit'] && $_POST['logout-submit'] == 'logout') {
		header('Refresh:3;url=../index.php');
		$_SESSION['loggued_on_user'] = "";
		echo "Logged out";
	}
	else {
		echo "ERROR\n";
	}

?>