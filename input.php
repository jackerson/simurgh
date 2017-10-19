<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Submit</title>
</head>
<body>
<form enctype="multipart/form-data" action="sourses.php">
	Topic:&nbsp 
		<select name="topic" >
			<option value="Computer Science"> Computer Science </option>
		</select><br>
	Sub Topic:&nbsp
		<select name="subTopic">
			<option value="Algorithms"> Algorithms </option>
			<option value="Data Structures"> Data Structures </option>
			<option value="Machine Learning">Machine Learning </option>
			<option value="Web Development"> Web Development </option>
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