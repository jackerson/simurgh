<?php
 //NOTE: You need to create an empty database named simurgh on your sql command line before you run this
	$connection = @mysqli_connect ("localhost", "root",
	"", "simurgh");
	if(mysqli_connect_errno())
		die("FALIED TO CONNECT TO DATABASE");
	$query='
		--
-- MySQL 5.6.12
-- Fri, 20 Oct 2017 20:11:36 +0000
--

CREATE TABLE if not exists `links` (
   `id` int(32) not null auto_increment,
   `subTopicId` int(32) not null,
   `type` varchar(32),
   `difficulty` double,
   `quality` double,
   `url` text,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
-- [Table `links` is empty]

CREATE TABLE if not exists `subtopic` (
   `id` int(32) not null auto_increment,
   `topicId` int(32) not null,
   `name` varchar(32) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- [Table `subtopic` is empty]

CREATE TABLE if not exists `topic` (
   `id` int(32) unsigned not null auto_increment,
   `name` varchar(32) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- [Table `topic` is empty]

insert into topic(id, name) values
(1, "Computer Science");

insert into subtopic(id, topicId, name) values
(1, 1, "Algorithms"),
(2, 1, "Data Structures"),
(3, 1, "Machine Learning"),
(4, 1, "Web Development");

--KEEP THIS COMMENT ON BOTTOM
';
$queryArr = explode(";",$query);
for($i = 0; $i < sizeof($queryArr); $i++)
{
	//echo $queryArr[$i]."<br>";
	if(mysqli_query($connection, $queryArr[$i].";"))
	{
		echo "Created table successfully<br>";
	}
	else
	{
		echo "Failed to insert into database:<br> ";
		echo mysqli_error($connection);
		echo "<br>";
	}
}
?>