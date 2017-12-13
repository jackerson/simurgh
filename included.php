<?php
session_start();
$connection = @mysqli_connect ("45.40.164.83", "simurgh",
    "CU4l!feSkoBufs", "simurgh");
	if(mysqli_connect_errno())
		die("FALIED TO CONNECT TO DATABASE");

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sendEmail($to, $subject, $htmlMsg){
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	//TODO: Add from
	$headers[] = 'From: Simurgh <ian.brobin@colorado.edu>';
	return mail($to, $subject, $htmlMsg, implode("\r\n", $headers));
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simurgh</title>
<base href="http://localhost/simurgh/" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<link rel="stylesheet" href="input.css">
</head>
<body class="centered-wrapper">
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="input.php">Simurgh</a>
  <?php
  if(isset($_SESSION["email"])){
  	$email = $_SESSION["email"];
  	echo "$email is signed in.&nbsp;<a href='logout.php'>Click Here </a>&nbsp;to sign out</br>";
  }
  else
  {
  	echo "<a href='signInForm.php'>Login or signup</a></br>";
  }
  ?>
</nav>

<img class="logo" src="logo.jpg" width="200px" height="200px">
