<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Links</title>
</head>
<body>
<?php
<<<<<<< HEAD
	
	$topic = $_REQUEST['topic'];
	$subTopic = $_REQUEST['subTopic'];
	$difficulty = $_REQUEST['difficulty'];
	

	if(!isser($topic)){
=======
	if(!isset($_REQUEST['topic'])){
>>>>>>> 252bb2b9b14749d8ae4631295de97533ce4e9204
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
		// Scoring: up/down vote system 
	



	?>

</form>
</body>
</html>