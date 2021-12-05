-- REVOKE

-- 사용자 'user_id'@'localhost'에 부여된 mydb 데이터베이스의 모든 테이블에 대한 권한을 회수
REVOKE ALL PRIVILEGES ON mydb.* FROM 'user_id'@'localhost';
