<?php
	session_start();

	$current_page = basename(__FILE__);
	require_once "header.php";

?>
	<div id="main">
		<div id="categories" class="panel">
			<h3>Categories</h3>
			<?php
			foreach ($categories as $key=>$category) {
			?>
			<div class="category">
				<a href="category.php?category=<?php echo $key; ?>"><img src="<?php echo $category[key($category)]['img_path']; ?>"></a><br/>
				<a href="category.php?category=<?php echo $key; ?>"><?php echo $key; ?></a>
				<br />
				<br />
			</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>

<?php
	require_once "footer.php";
?>
