<?php

	require_once('auth.php');
	session_start();

	if ($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd']))
	{
		header('Refresh:3;url=../index.php');
		$_SESSION['loggued_on_user'] = $_POST['login'];
		echo "Signed in as: ". $_SESSION['loggued_on_user'];
	}
	else
	{
		header('Refresh:3;url=../index.php');
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR Username/Password incorrect\n";
	}

?>