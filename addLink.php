<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Link</title>
</head>
<body>
<?php
	include "included.php";
	//$topic = $_REQUEST['topic'];
	$subTopic = $_REQUEST['subTopic'];
	$difficulty = $_REQUEST['Difficulty'];
	$type = $_REQUEST['type'];
	$url = $_REQUEST['URL'];
	
	//TODO:Make duplicate checking better, so that google.com and www.google.com are different. (Once option would be to format all links in a consistent way
	//TODO: Take care of SQL injection
	$checkQuery = mysqli_prepare($connection, "SELECT * from links where url = ? AND subTopicId = ?");
	mysqli_stmt_bind_param($checkQuery,"sd",$url, $subTopic);
	//Check if it ran correctly
	if(!mysqli_stmt_execute($checkQuery)){
		die("Checking Failed: ".mysqli_error($connection));
	}
	//If we are able to fetch an element, then a URL already exists
	if(mysqli_stmt_fetch($checkQuery))
	{
		die("I'm Sorry, but one another user has already submitted this link!");
	}
	else
	{
		$insertQuery = mysqli_prepare($connection, "Insert into links (subTopicId, type, difficulty, url)values (?, ?, ? , ?)");
		mysqli_stmt_bind_param($insertQuery, "dsds", $subTopic, $type, $difficulty, $url);
		
		if(mysqli_stmt_execute($insertQuery))
		{
			echo "Thank you for submitting a link!";
		}
		else
		{
			die("Insert Failed: ".mysqli_error($connection));
		}
	}
	
	mysqli_close($connection);
?>
</body>
</html>