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
		die("I'm Sorry, but an account exits that already has your email!");
	}
	//Password checking
	if($pword != $pword2){
		die("Passwords do not match, sorry");
	}
	//Email Checking/Sending
	//TODO ADD LINK
	
	$message = "
	<html>
	<head>
		<title>Confirmation Email</title>
	</head>
	<body>
		<h1>Simurgh!</h1></br>
		<p> Welcome to Simurgh! To confirm your account <a href='localhost/simurgh/emailVerification.php?email=$email'> Click Here</a></p>
	</body>
	</html>
	";
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	//TODO: Add from
	$headers[] = 'From: Simurgh <ian.brobin@colorado.edu>';
	$isMailed = mail($email, "Simurgh Verification", $message, implode("\r\n", $headers));
	if(!$isMailed)
	{
		die("Unable to send confirmation email. Is $email your email?");
	}
	$insertQuery = mysqli_prepare($connection, "Insert into users (email, password, verified) values (?, ?, 0)");
	//hashes the password
	$pwordHash = password_hash($pword, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($insertQuery, "ss", $email, $pwordHash);
	
	if(mysqli_stmt_execute($insertQuery))
	{
		echo "Welcome. We will now send you a verification email.";
	}
	else
	{
		die("Insert Failed: ".mysqli_error($connection));
	}
	
	mysqli_close($connection);
?>
</body>
</html>