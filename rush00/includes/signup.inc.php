<?php

	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] == "OK")
	{
		if (!file_exists('../private'))
			mkdir("../private");
		if(!file_exists('../private/passwd'))
			file_put_contents('../private/passwd', null);
		$account = unserialize(file_get_contents('../private/passwd'));
		if ($account)
		{
			$created = 0;
			foreach ($account as $ac)
				if ($ac['login'] === $_POST['login'])
					$created++;
		}
		if ($created)
		{
			echo "ERROR User name taken...\n";
			header('Refresh: 3; url=../index.php');
		}
		else
		{
			$temp['login'] = $_POST['login'];
			$temp['passwd'] = hash('whirlpool', $_POST['passwd']);
			$account[] = $temp;
			file_put_contents('../private/passwd', serialize($account));
			echo "Account Created...\n";
			header('Refresh: 3; url=../index.php');
		}
	}
	else
	{
		echo "ERROR\n";
		header('Refresh: 3; url=../index.php');
	}

?>