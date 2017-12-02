<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<?php
	$connection = @mysqli_connect ("localhost", "root",
	"", "simurgh");
	if(mysqli_connect_errno())
		die("FALIED TO CONNECT TO DATABASE");
?>
</head>
<body>
<?php
	$email = $_REQUEST['email'];
	$pword = $_REQUEST['password'];
	$pword2 = $_REQUEST['password2'];
	//This query checks if there is a duplicate email
	$checkQuery = mysqli_prepare($connection, "SELECT * from users where email = ?");
	//Check if it ran correctly
	mysqli_stmt_bind_param($checkQuery, "s", $email);
	if(!mysqli_stmt_execute($checkQuery)){
		die("Checking Failed: ".mysqli_error($connection));
	}
	//If we are able to fetch an element, then a URL already exists
	if(mysqli_stmt_fetch($checkQuery))
	{
		die("I'm Sorry, but one another user has already submitted this link!");
	}
	//Password checking
	if($pword != $pword2){
		die("Passwords do not match, sorry");
	}
	$insertQuery = mysqli_prepare($connection, "Insert into users (email, password) values (?, ?)");
	//hashes the password
	$pwordHash = password_hash($pword);
	mysqli_stmt_bind_param($insertQuery, "ss", $email, $pwordHash);
	
	if(mysqli_stmt_execute($insertQuery))
	{
		echo "Welcome. We will now send you a verification email.";
	}
	else
	{
		die("Insert Failed: ".mysqli_error($connection));
	}
	//TODO: SEND EMAIL
	
	mysqli_close($connection);
?>
</body>
</html>