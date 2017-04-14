CREATE TABLE IF NOT EXISTS `news` ( 
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	`title` VARCHAR(200) NOT NULL,
	`description` VARCHAR(1000) NOT NULL,
	`content` VARCHAR(4000) NULL,
	`date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `users` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(25) NOT NULL,
	`password` VARCHAR(25) NOT NULL,
	`role` VARCHAR(25) NULL
);

CREATE TABLE IF NOT EXISTS `comments` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`userId` INT NOT NULL,
	`newsId` INT NOT NULL,
	`text` VARCHAR(400) NOT NULL,
	`date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	FOREIGN KEY (`newsId`)
  		REFERENCES `news`(`id`)
		ON DELETE CASCADE,
	FOREIGN KEY (`userId`)
  		REFERENCES `users`(`id`)
		ON DELETE NO ACTION
);

CREATE INDEX news_date ON `news`(`date`);
CREATE INDEX comments_date ON `comments`(`date`);
CREATE INDEX users_name ON `users`(`name`);

INSERT INTO `users` (`name`,`password`,`role`) VALUES ('admin','adminadmin','admin')

