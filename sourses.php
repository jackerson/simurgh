<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Submit</title>
</head>
<body>
<?php
	echo "Input Received as:<br>";
	$topic = $_REQUEST['topic'];
	$subTopic = $_REQUEST['subTopic'];
	$difficulty = $_REQUEST['difficulty'];
	echo "Topic = $topic<br>";
	echo "SubTopic = $subTopic<br>";
	echo "difficulty = $difficulty<br>";
?>
</body>
</html>