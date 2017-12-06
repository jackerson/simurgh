<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simurgh</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


<link rel="stylesheet" href="css/input.css">
</head>
<body class="centered-wrapper">

	<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">Simurgh</a>
</nav>

<?php
	include "included.php";
?>

<img src="logo.jpg" width="200px" height="200px">

<form enctype="multipart/form-data" action="sources.php">
	&nbsp
	<div class="form_select">
		<select name="topic" value="Select a topic">
			<!--<option value="NULL"> Topic </option>-->
			<option value="Computer Science"> Computer Science </option>
		</select>
	&nbsp
		<select name="subTopic">
			<!-- <option value="NULL"> Sub-topic </option>-->
			<option value="Algorithms"> Algorithms </option>
		</select>
	&nbsp
		<select name="difficulty">
			<!-- <option value="NULL"> Difficulty </option>-->
			<option value="Easy"> Easy </option>
			<option value="Intermediate"> Intermediate </option>
			<option value="Advanced"> Advanced </option>
		</select>
	</div>

<div class="select_input">
<input type="submit" value="Search" />
</div>
</form>
<h5><i>Knowledge is a weapon. I intend to be formidably armed.<i></h5>
<div class="footer">
<hr class="fancy-line"></hr>
<p>Made with magic by Jaimie Ackerson, Ian Brobin, Faisal Lalani, Keiran Pirie, & Karl Todd</p>
</div>
</body>
</html>
