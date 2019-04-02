#!/usr/bin/php
<?php
	function ft_is_sort($array)
	{
		$sort = $array;
		sort($sort);
		if (array_diff_assoc($array, $sort) == null)
			return true;
		return false;
	}

?>
