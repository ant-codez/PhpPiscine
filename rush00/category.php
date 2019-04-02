<?php

	require_once 'db.php';
	require_once 'header.php';

	$product_db = open_db("private/product_db");

	$categories = $product_db['categories'];

?>
	<div id="main">
		<div id="items" class="panel">
			<h3><?php echo $category_name ?></h3>
			<?php
			if ($categories[$_GET['category']]) {
				foreach ($categories[$_GET['category']] as $key=>$item) {
?>
					<div class="item">
						<img src="<?php echo $item['img_path']; ?>"><br/>
						<?php echo $item['name']; ?><br />
						$<?php echo number_format((float)$item['price'], 2, '.', ','); ?> each<br />
						Number of items <form name="<?php echo $current_page; ?>" action="<?php echo $current_page; ?>" method="post"><input type="number" name="num_items" value="1" min="0"/><input type="hidden" name="item_number" value="<?php echo $key; ?>" /><input type="submit" name="cartadd" value="Add to cart" /></form>
						<br />
						<br />
					</div>
<?php
				}
			}
			else
				echo "Invalid category";
			?>
		</div>
	</div>
</body>
</html>