<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Link</title>
</head>
<body>
<?php
	$topic = $_REQUEST['topic'];
	$subTopic = $_REQUEST['subTopic'];
	$difficulty = $_REQUEST['difficulty'];
	$type = $_REQUEST['type'];
	$quality = $_REQUEST['quality'];
	$url = $_REQUEST['URL'];
	echo "topic: $topic<br>";
	echo "subTopic: $subTopic<br>";
	echo "difficulty: $difficulty<br>";
	echo "type: $type<br>";
	echo "quality: $quality<br>";
	echo "url: $url<br>";
	
?>
</body>
</html>