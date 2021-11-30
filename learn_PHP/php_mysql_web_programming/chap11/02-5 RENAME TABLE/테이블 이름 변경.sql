USE php_mysql_web_gnuwiz;

RENAME TABLE member TO member2;

-- 테이블 데이터베이스간 이동
RENAME TABLE php_mysql_web_gnuwiz.member TO test.member2;
