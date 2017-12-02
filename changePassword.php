<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
</head>
<body>
<?php
	include "included.php";
	$email = $_REQUEST['email'];
	$curPword = $_REQUEST['curpassword'];
	$newPword = $_REQUEST['newpassword'];
	$newPword2 = $_REQUEST['newpassword2'];
	//Checks if the current password is correct
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
	if(!password_verify($curPword, $hash)){
		die("Current password is incorrect, sorry!");
	}
	//Check if passwords are the same
	if($newPword != $newPword2){
		die("Passwords are not the same");
	}
	mysqli_stmt_close($checkQuery);
	$updateQuery = mysqli_prepare($connection, "UPDATE users SET password = ? where email = ?");
	$pwordHash = password_hash($newPword, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($updateQuery, "ss", $pwordHash, $email);
	if(mysqli_stmt_execute($updateQuery))
	{
		echo "You have successfully changed your password.";
	}
	else{
		die("Insert Failed: ".mysqli_error($connection));
	}
	
	mysqli_close($connection);
?>
</body>
</html>