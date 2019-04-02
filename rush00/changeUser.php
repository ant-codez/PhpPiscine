<?php	
	require_once "header.php";
?>

<div id="categories" class="panel">
	<body >
			<div class="category">
				<h1>Enter New Username and Password</h1>
				<form method="POST" action="advUser.php">
    					<input type="submit" value="Advanced Info" />
				</form>
				<form action="includes/changeUser.inc.php" method="POST">
					Username: <input type="text" name="newLogin" value="" placeholder="Enter Username..." />
				<br />
					Password: <input type="password" name="newPass" value="" placeholder="Enter Password..." />
				<br />
					<input type="submit" name="submit" value="OK"/>
				</form>
			</div>
	</body>
</div>


</html>