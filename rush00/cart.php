<?php

	require_once 'db.php';


	function add_to_cart(&$cart, $item_number, $num_to_add) {
		if (isset($_SESSION['cart'][$item_number]))
			$_SESSION['cart'][$item_number] += $num_to_add;
		else
			$_SESSION['cart'][$item_number] = $num_to_add;
	}


	function save_cart_to_user(&$cart, $username, $order_db_path, $product_db) {
		$order_db = open_db($order_db_path);
		$order_db[$username][] = ['cart' => $cart, 'total' => sum_cart_cost($cart, $product_db)];
		save_db($order_db, $order_db_path);
		$_SESSION['cart'] = NULL;
	}


	function count_items_in_cart($cart) {
		if ($cart) {
			$num_items = 0;
			foreach ($cart as $item_name=>$number) {
				$num_items += $number;
			}
		}
		return ($num_items);
	}

	function sum_cart_cost($cart, $product_db) {
		$sum = 0;
		foreach ($cart as $item_name=>$number) {
			$sum += $number * lookup_item_price($item_name, $product_db);
		}
		return ((float)$sum);
	}


	function update_cart(&$cart) {
		foreach ($_POST as $key => $number) {
			if ($key != "update-cart" && $key != "checkout-submit" && $key != "delete-cart")
				$cart[str_replace("_", " ", $key)] = $number;
		}
	}


	function delete_cart() {
		$_SESSION['cart'] = NULL;
	}
?>