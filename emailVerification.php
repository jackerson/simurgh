<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email</title>
</head>
<body>
<?php
	include "included.php";
	$email = $_REQUEST['email'];
	//Query that verifies this email
	$verifyQuery = mysqli_prepare($connection, "update users set verified = 1 where email = ?");
	mysqli_stmt_bind_param($verifyQuery, "s", $email);
	if(!mysqli_stmt_execute($verifyQuery)){
		die("Verification Failed: ".mysqli_error($connection));
	}
	echo "Your account has been verified";
	mysqli_close($connection);
?>
</body>
</html>