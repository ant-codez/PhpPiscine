<?php	
	require_once "header.php";
?>

<div id="categories" class="panel">
	<body >
			<div class="category">
				<form action="includes/signup.inc.php" method="POST">
					Username: <input type="text" name="login" value="" placeholder="Enter Username..." />
				<br />
					Password: <input type="password" name="passwd" value="" placeholder="Enter Password..." />
				<br />
					<input type="submit" name="submit" value="OK"/>
				</form>
			</div>
	</body>
</div>


</html>