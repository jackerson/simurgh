--
-- MySQL 5.6.12
-- Fri, 20 Oct 2017 19:12:28 +0000
--

CREATE TABLE `links` (
   `id` int(32) not null auto_increment,
   `subTopicId` int(32) not null,
   `type` varchar(32),
   `difficulty` double,
   `quality` double,
   `url` text,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- [Table `links` is empty]

CREATE TABLE `subtopic` (
   `id` int(32) not null auto_increment,
   `topicId` int(32) not null,
   `name` varchar(32) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- [Table `subtopic` is empty]

CREATE TABLE `topic` (
   `id` int(32) unsigned not null,
   `name` varchar(32) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- [Table `topic` is empty]