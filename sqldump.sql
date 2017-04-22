CREATE TABLE `matches` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `league_name` varchar(255) NOT NULL,
  `match_info` mediumtext NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;