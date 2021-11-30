USE php_mysql_web_gnuwiz;

-- 테이블 필드 추가
ALTER TABLE member ADD mb_tel INT;

-- 테이블 필드 삭제
ALTER TABLE member DROP mb_tel;

-- 테이블 필드 타입 변경
ALTER TABLE member MODIFY COLUMN mb_email DATE;
ALTER TABLE member MODIFY mb_email VARCHAR(255) NOT NULL DEFAULT '';
