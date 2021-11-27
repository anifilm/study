CREATE DATABASE php_ci3_book;
USE php_ci3_book;


CREATE TABLE `todo_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NULL,
  `created_on` date NULL,
  `due_date` date NULL,
  `use` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM COLLATE='utf8_general_ci';


INSERT INTO `todo_items`
	(`id`, `content`, `created_on`, `due_date`, `use`)
VALUES
	(1, '웅파 미팅', '2012-09-23', '2012-09-24', 1),
	(2, '스터디', '2012-09-24', '2012-09-25', 1),
	(3, '테스트', '2012-01-01', '2013-01-01', 1);
