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


-- this_is_mysql_shopdb 데이터베이스 구조 내보내기
CREATE DATABASE IF NOT EXISTS `this_is_mysql_shopdb` /*!40100 DEFAULT CHARACTER SET utf8mb3 */;
USE `this_is_mysql_shopdb`;

-- 테이블 this_is_mysql_shopdb.membertbl 구조 내보내기
CREATE TABLE IF NOT EXISTS `membertbl` (
  `memberID` char(8) NOT NULL,
  `memberName` char(5) NOT NULL,
  `memberAddress` char(20) DEFAULT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='회원 테이블';

-- 테이블 데이터 this_is_mysql_shopdb.membertbl:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `membertbl` DISABLE KEYS */;
INSERT INTO `membertbl` (`memberID`, `memberName`, `memberAddress`) VALUES
	('Dang', '당탕이', '경기 부천시 중동'),
	('Han', '한주연', '인천 남구 주안동'),
	('Jee', '지운이', '서울 은평구 증산동'),
	('Sang', '상길이', '경기 성남시 분당구');
/*!40000 ALTER TABLE `membertbl` ENABLE KEYS */;

-- 테이블 this_is_mysql_shopdb.producttbl 구조 내보내기
CREATE TABLE IF NOT EXISTS `producttbl` (
  `productName` char(4) NOT NULL,
  `cost` int(11) NOT NULL,
  `makeDate` date DEFAULT NULL,
  `company` char(5) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`productName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='제품 테이블';

-- 테이블 데이터 this_is_mysql_shopdb.producttbl:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `producttbl` DISABLE KEYS */;
INSERT INTO `producttbl` (`productName`, `cost`, `makeDate`, `company`, `amount`) VALUES
	('냉장고', 5, '2021-02-01', '대우', 22),
	('세탁기', 20, '2021-09-01', 'LG', 3),
	('컴퓨터', 10, '2020-01-01', '삼성', 17);
/*!40000 ALTER TABLE `producttbl` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
