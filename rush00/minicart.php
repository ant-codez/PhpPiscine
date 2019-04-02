<?php

	require_once 'cart.php';

if ($_POST['cartadd'] && $_POST['cartadd'] == "Add to cart" && isset($_POST['item_number']) && isset($_POST['num_items']) && $_POST['num_items'] != 0)
	add_to_cart($_SESSION['cart'], $_POST['item_number'], $_POST['num_items']);

if ($_POST['delete-cart'] == 'submit')
		delete_cart();

if (isset($_SESSION['cart']) && $_SESSION['cart'] != "") {
	echo count_items_in_cart($_SESSION['cart']) . ' items<br />$' . number_format((float)sum_cart_cost($_SESSION['cart'], $product_db), 2, '.', ',') . '<br />';
?>
	<form name="checkout" action="mycart.php" method="post">
		<button type="submit" name="checkout-submit" value="submit">Submit Order</button>
	</form>
<?php
}
else {
	echo "Your cart is empty";
}


?>
