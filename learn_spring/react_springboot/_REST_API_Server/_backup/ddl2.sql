create database image_shop CHARACTER SET utf8;

CREATE USER 'shop_admin'@'localhost' IDENTIFIED BY 'shop1234';
CREATE USER 'shop_admin'@'%' IDENTIFIED BY 'shop1234';

GRANT ALL PRIVILEGES ON dev_db.* TO 'shop_admin'@'localhost';
GRANT ALL PRIVILEGES ON dev_db.* TO 'shop_admin'@'%';