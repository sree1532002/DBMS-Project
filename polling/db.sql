USE `clubmanagement`;

CREATE TABLE IF NOT EXISTS `polls` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` text NOT NULL,
	`desc` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `poll_answers` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`poll_id` int(11) NOT NULL,
	`title` text NOT NULL,
	`votes` int(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

