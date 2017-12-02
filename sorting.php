<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sorting</title>
<?php
	$connection = @mysqli_connect ("127.0.0.1", "root", "", "simurgh");
	if(mysqli_connect_errno())
		die("FAILED TO CONNECT TO DATABASE");
?>
</head>
<body>
<?php
	$subTopic = $_REQUEST['subTopic'];
	$difficulty = $_REQUEST['difficulty'];
	$topic = $_REQUEST['topic'];
	
?>
</body>
</html>	