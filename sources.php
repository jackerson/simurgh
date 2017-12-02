<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Links</title>
</head>
<body>
<?php
	include "included.php";
	echo "Input Received as:<br>";
	$topic = $_REQUEST['topic'];
	$subTopic = $_REQUEST['subTopic'];
	$difficulty = $_REQUEST['difficulty'];
	if(!isset($topic)){
		die("No topic input, please try again");
	}
	
	if(!isset($subTopic)){
		die("No subTopic input, please try again");
	}
	
	if(!isset($difficulty)){
		die("No difficulty input, please try again");
	}

?>
<h2> Add Link to Page </h2>
<form action="addLink.php" method="post">
	Type: 
	<select name="type" >
		<option value='link'>Link</option>
	</select><br>
	Difficulty:
	<select name="difficulty" >
		<option value='0'>Easy</option>
		<option value='1'>Medium</option>
		<option value='2'>Hard</option>
	</select><br>
	Quality:
	<select name="quality" >
		<option value='0'>Poor</option>
		<option value='1'>Medium</option>
		<option value='2'>Excellent</option>
	</select><br>
	URL:
	<input name="URL" type="text"><br>
	<!-- Data that was already passed earlier -->
	<?php
		//echo "<input type='hidden' name='topic' value='$topic'>";
		echo "<input type='hidden' name='subTopic' value='$subTopic'>";
		
		mysqli_close($connection);
	?>
	<input type="submit" value="Submit">
	<?php
		while($row = mysql_fetch_array($result)){
			
		}
	?>
</form>
</body>
</html>