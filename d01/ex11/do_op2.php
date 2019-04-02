#!/usr/bin/php
<?php

	if ($argc != 2)
	{
		printf("Incorrect Parameters\n");
		exit();
	}
	$str = str_replace(" ", "", $argv[1]);
 	$nb1 = intval($str);
    $opp = substr(substr($str, strlen((string)$nb1)), 0, 1);
    $nb2 = substr(substr($str, strlen((string)$nb1)), 1);
	if (!is_numeric($nb1) || !is_numeric($nb2))
	{
		printf("Syntax Error\n");
		exit();
	}
	switch($opp)
	{
		case ("+"):
			printf("%d\n", $nb1 + $nb2);
			break;
		case ("-"):
			printf("%d\n", $nb1 - $nb2);
			break;
		case ("*"):
			printf("%d\n", $nb1 * $nb2);
			break;
		case ("/"):
			printf("%d\n", $nb1 / $nb2);
			break;
		case ("%"):
			printf("%d\n", $nb1 % $nb2);
			break;
		default:
			printf("Syntax Error\n");
	}
?>
