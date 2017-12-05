<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password</title>
</head>
<body>
<?php
	include "included.php";
	$email = $_REQUEST['email'];
	//Check if this email exists and get id
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
	//Delete password change requests from the same id
	$clearQuery = mysqli_prepare($connection, "DELETE FROM passwordChange where userId = $userId");
	if(!mysqli_stmt_execute($clearQuery)){
		die("Clearing failed:".mysqli_error($connection));
	}
	//Set random key for user to get into their account
	$key = generateRandomString();
	$keyHash = password_hash($key, PASSWORD_DEFAULT);
	$curTime = time();
	$passwordQuery = mysqli_prepare($connection, "INSERT INTO passwordChange (userId, keyHash, time) values ($userId, '$keyHash', $curTime)");
	if(!mysqli_stmt_execute($passwordQuery)){
		die("Insert Failed: ".mysqli_error($connection));
	}
	//Send email
	$message = "
	<html>
	<head>
		<title>Forgot Email</title>
	</head>
	<body>
		<h1>Email Reset for Simurgh!</h1></br>
		<p> Welcome to Simurgh! To reset your password <a href='localhost/simurgh/resetPasswordForm.php?userId=$userId&key=$key'>Click Here</a></p>
	</body>
	</html>
	";
	$isMailed = sendEmail($email, "Simurgh Reset Password", $message);
	if(!$isMailed)
	{
		die("Unable to send reset email. Is $email your email?");
	}
	echo "Reset email sent. Link will deactivate in 30 minutes";
	mysqli_close($connection);
?>
</body>
</html>