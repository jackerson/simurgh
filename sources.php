<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Links</title>
</head>
<body>
<?php
	include "included.php";

	if(!isset($_REQUEST['topic'])){
		die("No topic input, please try again");
	}
	
	if(!isset($_REQUEST['subTopic'])){
		die("No subTopic input, please try again");
	}
	
	if(!isset($_REQUEST['difficulty'])){
		die("No difficulty input, please try again");
  }
  
	$topic = $_REQUEST['topic'];
	$subTopic = $_REQUEST['subTopic'];
	$difficulty = $_REQUEST['difficulty'];
?>
<h2> Add Link to Page </h2>
<form action="addLink.php" method="post">
	Type: 
	<select name="type" >
		<option value='article'>Article</option>
		<option value='tutorial'>Tutorial</option>
		<option value='video'>Video</option>
		<option value='paper'>Paper</option>
		<option value='course'>Course</option>
		
	</select><br>
	Difficulty:
	<select name="Difficulty" >
		<option value='0'>Easy</option>
		<option value='1'>Medium</option>
		<option value='2'>Hard</option>
		
	</select><br>
	
	URL:
	<input name="URL" type="text"><br>
	<!-- Data that was already passed earlier -->
	<?php
		//echo "<input type='hidden' name='topic' value='$topic'>";
		echo "<input type='hidden' name='subTopic' value='$subTopic'>";

	?>
	<input type="submit" value="Submit">
	<?php 
	//$sortingQuery = mysqli_prepare($connection, "SELECT url, rank, type FROM links ORDER BY rank DESC WHERE topic = ?");
	//mysqli_stmt_bind_param($sortingQuery, "s", $subTopic);
	//mysqli_
	$sql = "SELECT url, rank, type FROM links ORDER BY rank DESC";
	$result = mysqli_query($sql);
	if(!$result){
		echo 'SQL Query Failed';
	}else{	// Scoring: up/down vote system 
	
		while($row = mysqli_fetch_array($result)){
			echo $row;
		}
	}
	
	
	mysqli_close($connection);
	?>

</form>
</body>
</html>