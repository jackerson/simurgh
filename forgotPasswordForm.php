<?php
	include "included.php";
?>
<div class="signForm">
<h1>Forgot Password</h1>
<form method="post" action="forgotPassword.php">
	<input class="url_field" type="text" name="email" placeholder="Enter your email"/></br>
	<input class="input_button" type="submit" value="Submit"/>
</form>
</div>
<?php
	mysqli_close($connection);
?>
</body>
</html>
