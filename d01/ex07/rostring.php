#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$array = explode(" ", $argv[1]);
		$last = array_shift($array);
		foreach ($array as $a)
			echo $a. " ";
		echo $last. "\n";
	}
?>
