-- GRANT

-- 사용자 'user_id'@'localhost'에 대해 'password'를 지정하여 계정 생성을 하며
-- mydb 데이터베이스의 모든 테이블에 대한 모든 권한을 부여
GRANT ALL PRIVILEGES ON mydb.* TO 'user_id'@'localhost' IDENTIFIED BY 'password';

-- 사용자 'user_id'@'localhost'의 권한 확인
SHOW GRANTS FOR 'user_id'@'localhost';
