<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Submit</title>
</head>
<body>
<?php
	include "included.php";
?>
<form method="post" action="changePassword.php">
	Email: <input type="text" name="email"/></br>
	Current Password: <input type="password" name="curpassword"/></br>
	New Password: <input type="password" name="newpassword"/></br>
	New Password: <input type="password" name="newpassword2"/></br>
	<input type="submit" value="submit"/>
</form>
<?php
	mysqli_close($connection);
?>
</body>
</html>