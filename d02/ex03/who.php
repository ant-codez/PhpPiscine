<?php

	date_default_timezone_set('America/Los_Angeles');
	$file = fopen("/var/run/utmpx", "r");
	while ($utmpx = fread($file, 628))
	{
		$unpack = unpack("a256a/a4b/a32c/id/ie/I2f/a256g/i16h", $utmpx);
		$array[$unpack['c']] = $unpack;
	}
	ksort($array);
	foreach ($array as $a)
	{
		if ($a['e'] == 7)
		{
			echo str_pad(substr(trim($a['a']), 0, 8), 8, " ")." ";
			echo str_pad(substr(trim($a['c']), 0, 8), 8, " ")." ";
			echo date("M", $a["f1"]);
			echo str_pad(date("j", $a["f1"]), 3, " ", STR_PAD_LEFT)." ".date("H:i", $a["f1"]);
			echo "\n";
		}
	}
	 
	//var_dump($array);
?>
