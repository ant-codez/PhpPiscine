#!/user/bin/php
<?php
	if ($argc < 2)
		exit();
	$str = trim(preg_replace('/\s+/S', " ", $argv[1]));
	printf("%s\n", $str);
?>
