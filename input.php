<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Page</title>
</head>
<body>
<?php
	$connection = @mysqli_connect ("127.0.0.1", "root",
	"", "simurgh");
	if(mysqli_connect_errno())
		die("FALIED TO CONNECT TO DATABASE");
?>
<form enctype="multipart/form-data" action="sources.php">
	Topic:&nbsp 
		<select name="topic" >
		<!-- List topics with php -->
			<?php
				$query = "SELECT name from topic order by name";
				$result = mysqli_query($connection, $query);
				while($row = mysqli_fetch_array($result))
				{
					echo "<option value='$row[0]'>$row[0]</option>";
				}
			?>
		</select><br>
	Sub Topic:&nbsp
		<select name="subTopic">
		<!-- List subtopics with php -->
			<?php
				$query = "SELECT name from subtopic order by name";
				$result = mysqli_query($connection, $query);
				while($row = mysqli_fetch_array($result))
				{
					echo "<option value='$row[0]'>$row[0]</option>";
				}
			?>
		</select><br>
	Difficulty:&nbsp 
		<select name="difficulty">
			<option value="Easy"> Easy </option>
			<option value="Intermediate"> Intermediate </option>
			<option value="Advanced"> Advanced </option>
		</select><br>
<input type="submit" value="Search" />
</form>
<?php
	
?>
</body>
</html>