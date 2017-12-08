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

if(isset($_SESSION["email"])){
	$email = $_SESSION["email"];
	echo "$email is signed in. <a href='logout.php'>Click Here</a> to sign out</br>";
}
else
{
	echo "No one is signed in</br>";
}
?>