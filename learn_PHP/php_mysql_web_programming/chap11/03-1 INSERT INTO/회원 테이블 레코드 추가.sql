USE php_mysql_web_gnuwiz;

INSERT INTO member (mb_id, mb_password, mb_name, mb_email) VALUES
  ('member01', '1234', '홍길동', 'hone@test.com'),
  ('member02', '1234', '임꺽정', 'im@test.com'),
  ('member03', '1234', '장길산', 'jang@test.com');

-- 테이블 필드 데이터 보기
SELECT * FROM member;
