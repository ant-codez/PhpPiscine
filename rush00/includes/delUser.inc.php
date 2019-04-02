<?php
    session_start();

    if ($_POST['delUser'] && $_SESSION['loggued_on_user'])
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
            $_SESSION['loggued_on_user'] = "";
            $temp['login'] = "";
			$temp['passwd'] = "";
			$accounts[$i] = $temp;
			file_put_contents('../private/passwd', serialize($accounts));
			echo "You have deleted your account...\n";
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