#!/usr/bin/php
<?php 
	
	if ($argc != 4)
	{
		printf("Incorrect Parameters\n");
		exit();
	}
	$sign = preg_replace('/\s+/', '', $argv[2]);
	if ($sign == '+')
		printf("%d", intval($argv[1]) + intval($argv[3]));
	if ($sign == '-')
		printf("%d", intval($argv[1]) - intval($argv[3]));
	if ($sign == '*')
		printf("%d", intval($argv[1]) * intval($argv[3]));
	if ($sign == '/')
		printf("%d", intval($argv[1]) / intval($argv[3]));
	if ($sign == '%')
		printf("%d", intval($argv[1]) % intval($argv[3]));
	printf("\n");
?>
