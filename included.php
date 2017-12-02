<?php
$connection = @mysqli_connect ("127.0.0.1", "root",
	"", "simurgh");
	if(mysqli_connect_errno())
		die("FALIED TO CONNECT TO DATABASE");
?>