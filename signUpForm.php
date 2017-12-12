<?php
	include "included.php";
?>
<div class="signForm">
	<h1>Sign up</h1>
		<form method = "post"  action="signUp.php">
			<input class="url_field" type="text" name="email" placeholder="Email"/></br>
			<input class="url_field" type="password" name="password" placeholder="Password"/></br>
			<input class="url_field" type="password" name="password2" placeholder="Confirm Password"/></br>
			<input class="input_button" type="submit" value="Submit" />
		</form>
		<a class="signLink" href="signInForm"><p>Already have an account? Log in!</p></a>
	</div>
	<?php
		mysqli_close($connection);
	?>
	</body>
</html>
