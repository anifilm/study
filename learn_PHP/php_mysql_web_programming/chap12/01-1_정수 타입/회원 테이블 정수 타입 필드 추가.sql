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

-- 정수 타입 필드 추가
ALTER TABLE member
ADD mb_tinyint TINYINT(4),     -- 1byte SIGNED (or UNSIGNED 지정가능)
ADD mb_smallint SMALLINT(6),   -- 2byte
ADD mb_mediumint MEDIUMINT(9), -- 3byte
ADD mb_int INT(11),            -- 4byte
ADD mb_bigint BIGINT(20);      -- 5byte
