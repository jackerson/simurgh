<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign In</title>
</head>
<body>
<?php
	include "included.php";
	
	$email = $_REQUEST['email'];
	$pword = $_REQUEST['password'];
	//Checks if the password is correct
	$checkQuery = mysqli_prepare($connection, "SELECT password from users where email = ?");
	//Bind variables
	mysqli_stmt_bind_param($checkQuery, "s", $email);
	if(!mysqli_stmt_execute($checkQuery)){
		die("Checking Failed: ".mysqli_error($connection));
	}
	mysqli_stmt_bind_result($checkQuery, $hash);
	if(!mysqli_stmt_fetch($checkQuery)){
		die("Could not find an account with that email, sorry!");
	}
	if(!password_verify($pword, $hash)){
		die("That password is incorrect, sorry!");
	}
	echo "You are logged in!";
	$_SESSION["email"] = $email;
	mysqli_close($connection);
?>
</body>
</html>