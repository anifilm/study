CREATE DATABASE php_ci3_book;
USE php_ci3_book;


CREATE TABLE `ci_sns_files` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `pid` INT(10) NOT NULL DEFAULT '0' COMMENT '원글 번호',
  `username` VARCHAR(50) NOT NULL COMMENT '사용자명',
  `subject` VARCHAR(100) NOT NULL COMMENT '게시글 제목',
  `contents` VARCHAR(200) NOT NULL COMMENT '내용',
  `file_path` VARCHAR(150) NOT NULL,
  `file_name` VARCHAR(100) NOT NULL COMMENT '서버 저장 경로와 변경된 파일명',
  `original_name` VARCHAR(100) NOT NULL COMMENT '서버 저장 경로와 원래 파일명',
  `detail_info` VARCHAR(500) NOT NULL COMMENT '타입, 크기 등의 정보',
  `hit` INT(10) NOT NULL DEFAULT '1' COMMENT '조회수',
  `reg_date` DATETIME NOT NULL COMMENT '등록일',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB COLLATE='utf8_general_ci' COMMENT='SNS 프로젝트';
