<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Links</title>
</head>
<body>
<?php
	
	$topic = $_REQUEST['topic'];
	$subTopic = $_REQUEST['subTopic'];
	$difficulty = $_REQUEST['difficulty'];
<<<<<<< HEAD
<<<<<<< HEAD
	if(!isset($topic)){
		die("No topic input, please try again");
	}
	
	if(!isset($subTopic)){
		die("No subTopic input, please try again");
	}
	
	if(!isset($difficulty)){
		die("No difficulty input, please try again");
	}

=======
=======
>>>>>>> 84420f4864b2a366916c4d8bc7eccdb9641d1964
	if(!isser($topic)){
		die("No topic input, please try again");
	}

	if(!isset($subTopic)){
		die("No SubTopic input, please try again");
	}

	if(!isset($difficulty)){
		die("No difficulty input, please try again");
	}
	
	
	echo "Topic = $topic<br>";
	echo "SubTopic = $subTopic<br>";
	echo "difficulty = $difficulty<br>";
<<<<<<< HEAD
>>>>>>> 280a1379d25cc3f9f40365071eaf0409dfbc455d
=======

>>>>>>> 84420f4864b2a366916c4d8bc7eccdb9641d1964
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
	<select name="difficulty" >
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
		while($row = mysql_fetch_array($result)){
			
		}
	?>
</form>
</body>
</html>