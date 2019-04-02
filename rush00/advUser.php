<?php    
	require "header.php";
?>

<div id="categories" class="panel">
    <body >
            <div class="category">
                <h1>Enter Stuff</h1>
				<form action="includes/advUser.inc.php" method="POST">
					First Name: <input type="text" name="fName" value="" placeholder="Enter Firstname..." />
				<br />
					Last Name: <input type="text" name="lName" value="" placeholder="Enter Lastname..." />
                <br />
                    Email: <input type="email" name="email" value="" placeholder="Enter Email..." />
                <br />
					<input type="submit" name="submit" value="OK"/>
				</form>
            </div>
    </body>
</div>


</html>