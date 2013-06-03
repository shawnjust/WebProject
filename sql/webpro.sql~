DROP TABLE IF EXISTS `user_info`;

CREATE TABLE `user_info` (
	`user_id` int(11) NOT NULL AUTO_INCREMENT,
	`user_name` varchar(30) NOT NULL UNIQUE,
	`nick_name` varchar(30) NOT NULL,
	`user_password` varchar(30) NOT NULL,
	CONSTRAINT `user_info_pk` PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user_relation`;

CREATE TABLE `user_relation` (
	`user_id_1` int(11) NOT NULL,
	`user_id_2` int(11) NOT NULL,
	CONSTRAINT `user_relation_pk` PRIMARY KEY (user_id_1, user_id_2),
	FOREIGN KEY (user_id_1) REFERENCES `user_info`(user_id),
	FOREIGN KEY (user_id_2) REFERENCES `user_info`(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `note`;

CREATE TABLE `note` (
	`note_id` int(11) NOT NULL AUTO_INCREMENT,
	`user_id` int(11) NOT NULL,
	`content` TEXT NOT NULL,
	`publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT `note_pk` PRIMARY KEY (`note_id`),
	FOREIGN KEY (`user_id`) REFERENCES `user_info`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `note_comment`;

CREATE TABLE `note_comment` (
	`comment_id` int(11) NOT NULL AUTO_INCREMENT,
	`note_id` int (11) NOT NULL,
	`user_id` int(11) NOT NULL,
	`content` TEXT NOT NULL,
	`publish_time` DATETIME(6) NOT NULL,
	CONSTRAINT `note_comment_pk` PRIMARY KEY (`comment_id`),
	FOREIGN KEY (`user_id`) REFERENCES `user_info`(`user_id`),
	FOREIGN KEY (`note_id`) REFERENCES `note`(`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
