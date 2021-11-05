create database dev_db CHARACTER SET utf8;

CREATE USER 'hdcd'@'localhost' IDENTIFIED BY '1234';
CREATE USER 'hdcd'@'%' IDENTIFIED BY '1234';

GRANT ALL PRIVILEGES ON dev_db.* TO 'hdcd'@'localhost';
GRANT ALL PRIVILEGES ON dev_db.* TO 'hdcd'@'%';