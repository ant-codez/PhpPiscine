<?php
    session_start();

    if ($_POST['fName'] && $_POST['lName'] && $_POST['email'] && $_SESSION['loggued_on_user'])
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
            $accounts[$i]['FirstName'] = $_POST['fName'];
            $accounts[$i]['LastName'] = $_POST['lName'];
            $accounts[$i]['Email'] = $_POST['email'];
			file_put_contents('../private/passwd', serialize($accounts));
			echo "You have Added Advanced info your account...\n";
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