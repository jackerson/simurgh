<?php
session_start();
$connection = @mysqli_connect ("127.0.0.1", "root",
	"", "simurgh");
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

if(isset($_SESSION["email"])){
	$email = $_SESSION["email"];
	echo "$email is signed in. <a href='logout.php'>Click Here</a> to sign out</br>";
}
else
{
	echo "No one is signed in</br>";
}
?>