USE php_mysql_web_gnuwiz;

CREATE TABLE member (
  mb_no INT(11) NOT NULL AUTO_INCREMENT,
  mb_id VARCHAR(20) NOT NULL DEFAULT '',
  mb_password VARCHAR(255) NOT NULL DEFAULT '',
  mb_name VARCHAR(255) NOT NULL DEFAULT '',
  mb_email VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (mb_no),
  UNIQUE INDEX mb_id (mb_id)
);

-- 테이블 정보 보기
DESC member;
