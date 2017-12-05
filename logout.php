<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log Out</title>
</head>
<body>
<?php
	include "included.php";
	session_unset();
	echo "You have been logged out.";
	mysqli_close($connection);
?>
</body>
</html>