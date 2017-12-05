<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Submit</title>
</head>
<body>
<?php
	include "included.php";
	$email = $_REQUEST['email'];
	//Check if this email exists
	$checkQuery = mysqli_prepare($connection, "SELECT id from users where email = ?");
	mysqli_stmt_bind_param($checkQuery, "s", $email);
	if(!mysqli_stmt_execute($checkQuery)){
		die("Checking Failed: ".mysqli_error($connection));
	}
	mysqli_stmt_bind_result($checkQuery, $userId);
	if(!mysqli_stmt_fetch($checkQuery)){
		die("Could not find an account with that email, sorry!");
	}
	mysqli_stmt_close($checkQuery);
	echo "Your id is $id";
	//Set random password
	$password = generateRandomString();
	$passwordHash = password_hash($password, PASSWORD_DEFAULT);
	$passwordQuery = mysqli_prepare($connection, "UPDATE users set password= where email = ?");
	//Send email
	mysqli_close($connection);
?>
</body>
</html>