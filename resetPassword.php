<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<?php
	include "included.php";
	$userId = $_REQUEST['userId'];
	$key = $_REQUEST['key'];
	$newPassword = $_REQUEST['password'];
	$newPassword2 = $_REQUEST['password2'];
	if($newPassword != $newPassword2){
		die("Passwords do not match.");
	}
	//Check if key matches
	$keyQuery = mysqli_prepare($connection, "SELECT keyHash, time from passwordChange where userId = ?");
	mysqli_stmt_bind_param($keyQuery, "d", $userId);
	if(!mysqli_stmt_execute($keyQuery)){
		die("Checking Failed: ".mysqli_error($connection));
	}
	mysqli_stmt_bind_result($keyQuery, $keyHash, $time);
	if(!mysqli_stmt_fetch($keyQuery)){
		//Will be thrown is userId is not found
		die("It appears there was an error.");
	}
	if(!password_verify($key, $keyHash)){
		//Will be thrown is key does not match initial key
		die("It appears there was an error");
	}
	//Check if they are in 30 minute window
	if( (time() - $time) > 60 * 30){
		die("That link is no longer active. Please refill out the forgot password form");
	}
	mysqli_stmt_close($keyQuery);
	//Reset password
	$resetQuery = mysqli_prepare($connection, "UPDATE users SET password = ? where id = ?");
	$passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($resetQuery, "sd", $passwordHash, $userId);
	if(mysqli_stmt_execute($resetQuery))
	{
		echo "You have successfully reset your password.";
	}
	else{
		die("Insert Failed: ".mysqli_error($connection));
	}
	mysqli_close($connection);
?>
</body>
</html>