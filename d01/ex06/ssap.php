#!/usr/bin/php
<?php
	$array = array();
	unset($argv[0]);
	foreach($argv as $av)
	{
		$tmp = array_filter(explode(' ', $av));
		foreach ($tmp as $t)
			$array[] = $t;
	}
	sort($array);
	foreach ($array as $v)
		echo $v."\n";
?>
