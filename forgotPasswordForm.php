<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password</title>
</head>
<body>
<?php
	include "included.php";
?>
<h1>Forgot Password</h1>
<form method="post" action="forgotPassword.php">
	Email: <input type="text" name="email"/></br>
	<input type="submit" value="submit"/>
</form>
<?php
	mysqli_close($connection);
?>
</body>
</html>