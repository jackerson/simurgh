<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sign Up</title>
	</head>
	<body>
	<?php
		include "included.php";
	?>
		<form method = "post"  action="signUp.php">
			Email: <input type="text" name="email"/></br>
			Password: <input type="password" name="password"/></br>
			Retype Password: <input type="password" name="password2"/></br>
			<input type="submit" value="submit" />
		</form>
	<?php
		mysqli_close($connection);
	?>
	</body>
</html>