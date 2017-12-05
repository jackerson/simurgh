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
?>
<h1>Reset Password</h1>
<form method = "post" action="resetPassword.php">
	<?php
		echo "<input type='hidden' name='userId' value='$userId'/>";
		echo "<input type='hidden' name='key' value='$key'/>";
	?>
	New Password:<input type = 'password' name = 'password'/></br>
	Retype Password:<input type = 'password' name = 'password2'/></br>
	<input type="submit" value="submit"/>
</form>
<?php	
	mysqli_close($connection);
?>
</body>
</html>