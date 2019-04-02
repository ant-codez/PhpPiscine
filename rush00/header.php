<?php
	session_start();

	require_once 'db.php';
	$product_db = open_db("private/product_db");
	$categories = $product_db['categories'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="This is an example of a meta description.">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="files/chopshop.css">
	</head>
	<body>
		<header>
			<nav class="header">
				<a href="index.php">
					<img src="assets/cleaver.svg">
				</a>
				<div id="cartdiv">
					<a href="mycart.php">
						<img id="cartimg" src="assets/cart.svg">
					</a>
					<div id="cart" class="panel subpanel">
<?php 
						require_once 'minicart.php';
?>
					</div>
				</div>
				<?php if (!file_exists("private/product_db")) { ?><a href="install.php">Initialize Product DB</a><?php } ?>
				<h1> ChopShop </h1>
				<div class="flex-container">
<?php
				if ($_SESSION['loggued_on_user']) {
?>
					Logged in as
<?php
					echo $_SESSION['loggued_on_user'];
?>
					<form action="logout.php" method="POST">
						<button type="sumbit" value="logout" name="logout-submit">Logout</button>
					</form>
					<form action="changeUser.php" method="POST">
						<button type="sumbit" value="logout" name="logout-submit">Modify Account</button>
					</form>
					<form action="delUser.php" method="POST">
						<button type="sumbit" value="logout" name="logout-submit">Remove Account</button>
					</form>
					
<?php
				}
				else {
?>
					<form action="login.php" method="POST">
						<input type="text" name="login" placeholder="Username..." value="" />
						<input type="password" name="passwd" placeholder="Password..." value="" />
						<input type="submit" name="submit" value="Login" />
					</form>
					<form action="signup.php">
						<input type="submit" value="Signup" />
					</form>
<?php
				}
?>
				</div>
			</nav>
		</header>