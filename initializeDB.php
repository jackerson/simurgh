<?php
 //NOTE: You need to create an empty database named simurgh on your sql command line before you run this
	$connection = @mysqli_connect ("localhost", "root",
	"", "simurgh");
	if(mysqli_connect_errno())
		die("FALIED TO CONNECT TO DATABASE");
	$query='
		--
		-- MySQL 5.6.12
		-- Fri, 20 Oct 2017 19:12:28 +0000
		--

		CREATE TABLE links (
		   id int(32) not null auto_increment,
		   subTopicId int(32) not null,
		   type varchar(32),
		   difficulty double,
		   quality double,
		   url text,
		   PRIMARY KEY (id)
		);

		-- [Table `links` is empty]

		CREATE TABLE if not exists subtopic (
		   id int(32) auto_increment,
		   topicId int(32) not null,
		   name varchar(32) not null,
		   PRIMARY KEY (id)
		);

		-- [Table `subtopic` is empty]

		CREATE TABLE topic (
		   id int(32) unsigned not null,
		   name varchar(32) not null,
		   PRIMARY KEY (id)
		);

		-- [Table `topic` is empty]';
	if(mysqli_query($connection, $query))
	{
		echo "Created tables successfully";
	}
	else
	{
		echo "Failed to insert into database:<br> ";
		echo mysqli_error($connection);
	}
?>