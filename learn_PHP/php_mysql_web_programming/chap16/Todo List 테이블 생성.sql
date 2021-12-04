USE php_mysql_web_gnuwiz;

CREATE TABLE project_todo (
	id INT(11) NOT NULL AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL DEFAULT '',
	checked TINYINT(1) NOT NULL DEFAULT '0',
	datetime DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (id),
	UNIQUE KEY id(id),
	KEY datetime (datetime)
);

-- 테이블 정보 보기
DESC member;
