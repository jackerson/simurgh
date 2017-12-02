<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign In</title>
</head>
<body>
<?php
	include "included.php";
?>
<h1>Sign In</h1>
<form method="post" action="signIn.php">
	Email: <input type="text" name="email"/></br>
	Password: <input type="password" name="password"/></br>
	<input type="submit" value="submit"/>
</form>
<?php
	mysqli_close($connection);
?>
</body>
</html>