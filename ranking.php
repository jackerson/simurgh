<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ranking</title>
</head>
<body>
<?php
	include "included.php";
	$linkId = $_REQUEST['id'];
	$upDown = $_REQUEST['upDown'];
	
	$rankQuery = mysqli_prepare($connection, "SELECT rank FROM links WHERE id = ?");
	mysqli_stmt_bind_param($rankQuery, "d", $linkId);
	
	if(!mysqli_stmt_execute($rankQuery)){
		die("Ranking query failed: ".mysqli_error($connection));
	}
	//bind query to the rank variable
	mysqli_stmt_bind_result($rankQuery, $rank);
	if(!mysqli_stmt_fetch($rankQuery)){
		die("No ID found.");
	}
	mysqli_stmt_close($rankQuery);
	if($upDown == "up"){
		$rank++;
	}
	else{
		$rank--;
	}
	$upDownQuery = mysqli_prepare($connection, "UPDATE links SET rank = $rank where id = $linkId");
	
	if(!mysqli_stmt_execute($upDownQuery)){
		die("UpDown Query failed: ".mysqli_error($connection));
	}
	
	
?>
</body>
</html>