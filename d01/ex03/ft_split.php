#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$split = array_filter(explode(' ', $str));
		sort($split);
		return $split;
	}
?>
