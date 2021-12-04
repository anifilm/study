USE php_mysql_web_gnuwiz;

CREATE TABLE project_member (
	mb_no INT(11) NOT NULL AUTO_INCREMENT,
	mb_id VARCHAR(20) NOT NULL DEFAULT '',
	mb_password VARCHAR(255) NOT NULL DEFAULT '',
	mb_name VARCHAR(255) NOT NULL DEFAULT '',
	mb_email VARCHAR(255) NOT NULL DEFAULT '',
	mb_gender VARCHAR(255) NOT NULL DEFAULT '',
	mb_job VARCHAR(255) NOT NULL DEFAULT '',
	mb_language VARCHAR(255) NOT NULL DEFAULT '',
	mb_datetime DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (mb_no),
	UNIQUE KEY mb_id (mb_id),
	KEY mb_datetime (mb_datetime)
);

-- 테이블 정보 보기
DESC member;
