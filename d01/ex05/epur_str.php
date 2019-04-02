#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = explode(" ", $argv[1]);
		$str = array_filter($str);
		$str = array_slice($str, 0);
		$str = implode(" ", $str);
		echo $str."\n";
	}
?>
