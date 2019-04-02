<?php

	require_once 'cart.php';
	if ($_POST['delete-cart'] == 'submit')
		delete_cart();
	require_once 'header.php';

	$product_db = open_db("private/product_db");


	if ($_POST['delete-cart'] == 'submit')
		delete_cart();

	$cart = $_SESSION['cart'];

	if ($_POST['update-cart'] == 'submit')
		update_cart($cart);

	$_SESSION['cart'] = $cart;

	if ($_POST['checkout-submit'] == "submit" && $_SESSION['loggued_on_user'] != "") {
		save_cart_to_user($cart, $_SESSION['loggued_on_user'], "private/order_db", $product_db);
		$cart = $_SESSION['cart'];
	}

?>
	<div id="main">
		<div id="items" class="panel">
			<h3>My Cart</h3>
			<?php
			if (count_items_in_cart($cart)) {
			?>
				<form name="cart" action="mycart.php" method="post">
			<?php
				foreach ($_SESSION['cart'] as $item_name=>$number) {
				?>
				<div class="cart-item">
					<!-- <img src="<?php echo 'image goes here'; ?>"><br/> -->
					<input type="number" min="0" name="<?php echo $item_name; ?>" value="<?php echo $number; ?>"> <?php echo $item_name; ?>
					<br />
					$<?php echo number_format($number * lookup_item_price($item_name, $product_db), 2, '.', ','); ?>
					<br />
					<br />
				</div>
				<?php } ?>
				<button type="submit" name="update-cart" value="submit">Update Cart</button>
				<button type="submit" name="delete-cart" value="submit">Delete Cart</button>
				<br />
				<br />
				<em>$
					<?php echo number_format(sum_cart_cost($cart, $product_db), 2, '.', ','); ?> total
				</em>
				</form>
				<br />
<?php
				if ($_SESSION['loggued_on_user'] == "") {
					?>You must login before submitting an order<?php
				}
				else {
					?>
					<form name="checkout" action="mycart.php" method="post">
						<button type="submit" name="checkout-submit" value="submit">Submit Order</button>
					</form>
				<?php
				}
?>
			<?php } ?>
		</div>
	</div>
</body>
</html>
