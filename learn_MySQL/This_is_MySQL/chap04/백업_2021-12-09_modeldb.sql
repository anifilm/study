-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        10.6.4-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- this_is_mysql_modeldb 데이터베이스 구조 내보내기
CREATE DATABASE IF NOT EXISTS `this_is_mysql_modeldb` /*!40100 DEFAULT CHARACTER SET utf8mb3 */;
USE `this_is_mysql_modeldb`;

-- 테이블 this_is_mysql_modeldb.buytbl 구조 내보내기
CREATE TABLE IF NOT EXISTS `buytbl` (
  `userName` char(3) NOT NULL,
  `prodName` char(3) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  KEY `FK_buytbl_usertbl` (`userName`),
  CONSTRAINT `FK_buytbl_usertbl` FOREIGN KEY (`userName`) REFERENCES `usertbl` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='구매 테이블';

-- 테이블 데이터 this_is_mysql_modeldb.buytbl:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `buytbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `buytbl` ENABLE KEYS */;

-- 테이블 this_is_mysql_modeldb.usertbl 구조 내보내기
CREATE TABLE IF NOT EXISTS `usertbl` (
  `userName` char(3) NOT NULL,
  `birthYear` int(11) NOT NULL,
  `addr` char(2) NOT NULL,
  `mobile` char(12) DEFAULT NULL,
  PRIMARY KEY (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='고객 테이블';

-- 테이블 데이터 this_is_mysql_modeldb.usertbl:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `usertbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `usertbl` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
