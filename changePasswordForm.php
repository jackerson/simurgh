<?php
	include "included.php";
?>
<div class="signForm">
<h1>Change Password</h1>
<form method="post" action="changePassword.php">
	<input type="text" name="email" placeholder="Email"/></br>
	<input type="password" name="curpassword" placeholder="Current Password"/></br>
	<input type="password" name="newpassword" placeholder="New Password"/></br>
	<input type="password" name="newpassword2" placeholder="Confirm New Password"/></br>
	<input class="input_button" type="submit" value="Submit"/>
</form>
</div>
<?php
	mysqli_close($connection);
?>
</body>
</html>
