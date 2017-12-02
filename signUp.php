<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
</head>
<body>
<?php
	include "included.php";
	$email = $_REQUEST['email'];
	$pword = $_REQUEST['password'];
	$pword2 = $_REQUEST['password2'];
	
	mysqli_close($connection);
	
?>
</body>
</html>