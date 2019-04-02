<?php
    session_start();

    if ($_POST['newLogin'] && $_POST['newPass'] && $_SESSION['loggued_on_user'])
	{
		$accounts = unserialize(file_get_contents('../private/passwd'));
		if ($accounts)
		{
            $found = 0;
            $i = 0;
            foreach ($accounts as $ac)
            {
                if ($ac['login'] === $_SESSION['loggued_on_user'])
                {
                    $found++;
                    break;
                }
                $i++;
            }
		}
        if ($found == 1)
        {
            $_SESSION['loggued_on_user'] = $_POST['newLogin'];
            $temp['login'] = $_POST['newLogin'];
			$temp['passwd'] = hash('whirlpool', $_POST['newPass']);
			$accounts[$i] = $temp;
			file_put_contents('../private/passwd', serialize($accounts));
			echo "You have Modified your account...\n";
            header('Refresh: 3; url=../index.php');
        }
		else
		{
            echo "IDK MANG";
            header('Refresh: 3; url=../index.php');
		}
	}
	else
	{
        echo "ERROR\n";
        header('Refresh: 3; url=../index.php');
    }

?>