<?php

	function open_db($db_path) {
		if (file_exists($db_path)) {
			$file = file_get_contents($db_path);
			$saved_db = unserialize($file);
		}
		else
			$saved_db = [];
		return ($saved_db);
	}


	function save_db($db, $db_path) {
		$file = serialize($db);
		if (!file_exists('private')) {
			mkdir('private', 0777, true);
		}
		file_put_contents($db_path, $file);
	}


	function update_item($name, $price, $img_path, &$categories) {
		$categories['all'][$name] = ['name' => $name, 'price' => $price, 'img_path' => $img_path];
	}


	function add_item_to_category(&$category, &$all_items, $item_name) {
		$category[$item_name] = &$all_items[$item_name];
	}

	function create_item_to_category($name, $price, $img_path, $category_name, &$categories) {
		update_item($name, $price, $img_path, $categories);
		add_item_to_category($categories[$category_name], $categories['all'], $name);
	}

	function save_category($category, $category_name, $product_db_path) {
		$cat_list = open_db($category_db_path);
		$cat_list[$category_name] = $category;
		save_db($cat_list, $category_db_path);
	}

	function save_product_db($product_db, $product_db_path) {
		save_db($product_db, $product_db_path);
	}


	function lookup_item_price($item_name, $product_db) {
		return ((float)$product_db['categories']['all'][$item_name]['price']);
	}


?>
