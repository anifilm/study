USE php_mysql_web_gnuwiz;

-- 기존 데이터를 삭제 후 다시 추가한다.
REPLACE(md_id, 'member04', 'user04') WHERE mb_name='홍길동';

-- 테이블 필드 데이터 보기
SELECT * FROM member;
