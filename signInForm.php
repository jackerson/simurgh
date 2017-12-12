<?php
	include "included.php";
?>
<div class="signForm">
<h1>Sign In</h1>
<form method="post" action="signIn.php">
	<input class="url_field" type="text" name="email" placeholder="Email"/></br>
	<input class="url_field" type="password" name="password" placeholder="Password"/></br>
	<input class="input_button" type="submit" value="Submit"/>
</form>
<a class="signLink" href="signUpForm"><p>Don't have an account? Sign up!</p></a>
<a class="signLink" href="forgotPasswordForm"><p>Forgot password?</p></a>
</div>
<?php
	mysqli_close($connection);
?>
</body>
</html>
