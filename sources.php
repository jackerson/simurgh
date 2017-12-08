<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Links</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
</form>
	<?php 
	$sortingQuery = mysqli_prepare($connection, "SELECT id, url, rank, type FROM links WHERE subTopicId = ? ORDER BY rank DESC");
	mysqli_stmt_bind_param($sortingQuery, "d", $subTopic);
	if(!mysqli_stmt_execute($sortingQuery)){
		die("SQL Query Failed: ".mysqli_error($connection));
	}
	//when executed, bind variables
	mysqli_stmt_bind_result($sortingQuery, $id, $url, $rank, $type);	
	?>
	</br>
	<script>
		$(document).ready(function(){
			$('.voting').click(function(){
				var upDown = $(this).attr('name');
				var id = $(this).attr('value');
				console.log(upDown);
				console.log(id);
				var ajaxurl = 'ranking.php?upDown='+upDown+'&id='+id;
				$.post(ajaxurl, function(response) {
					console.log(response);
					location.reload();
				});
			});
		});
	</script>
	<table>
		<tr>
			<th>URL</th>
			<th>Rank</th>
			<th>Type</th>
			<th>Vote Up</th>
			<th>Vote Down</th>
		</tr>
	<?php
	while(mysqli_stmt_fetch($sortingQuery)){//looping through each row in the table
		echo "<tr>";
		echo "<td>$url</td>";
		echo "<td>$rank</td>";
		echo "<td>$type</td>";
		echo "<td><button class = 'voting' name = 'up' value = '$id'>Up</button></td>";
		echo "<td><button class = 'voting' name = 'down' value = '$id'>Down</button></td>";
		echo "</tr>";
	}
	
	
	mysqli_close($connection);
	?>
	</table>
</body>
</html>