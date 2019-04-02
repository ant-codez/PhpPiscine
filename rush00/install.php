<?php

	require_once 'db.php';

	function initialize_product_db() {
		$product_db = open_db("private/product_db");
		create_item_to_category("Fuji Apple", 1.00, "assets/fuji_apple.jpg", "Fruits", $product_db['categories']);
		create_item_to_category("Granny Smith Apple", 1.50, "assets/granny_smith_apple.jpg", "Fruits", $product_db['categories']);
		create_item_to_category("iMac", 1000000.00, "assets/imac.jpg", "Fruits", $product_db['categories']);
		create_item_to_category("Regular PC", 0.15, "assets/regular_pc.jpg", "Computers", $product_db['categories']);
		add_item_to_category($product_db['categories']['Computers'], $product_db['categories']['all'], "iMac");
		update_item('Fuji Apple', 0.99, 'assets/fuji_apple.jpg', $product_db['categories']);
		save_product_db($product_db, "private/product_db");
		header('Location: index.php');
	}

	initialize_product_db();
?>