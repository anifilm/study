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

-- 문자열 타입 필드 추가
ALTER TABLE member
ADD mb_char CHAR(10),       -- 256byte   (범위 0~255) 고정형, 남은 공간을 공백으로 채운다.
ADD mb_varchar VARCHAR(10); -- 65532byte (범위 0~255) 가변형, 길이 기록을 위해 1byte 추가

UPDATE member
SET mb_char='hong', mb_varchar='hong'
WHERE mb_name='홍길동';

TYPE       0  1  2  3  4  5  6  7  8  9
CHAR(M)    H  O  N  G 공백...
VARCHAR(M) H  O  N  G 길이
