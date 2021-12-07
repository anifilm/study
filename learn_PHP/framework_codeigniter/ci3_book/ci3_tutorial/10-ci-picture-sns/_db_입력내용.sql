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
  `hits` INT(10) NOT NULL DEFAULT '1' COMMENT '조회수',
  `reg_date` DATETIME NOT NULL COMMENT '등록일',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB COLLATE='utf8_general_ci' COMMENT='SNS 프로젝트';


INSERT INTO `ci_sns_files` (`id`, `pid`, `username`, `subject`, `contents`, `file_path`, `file_name`, `original_name`, `detail_info`, `hit`, `reg_date`) VALUES
	(2, 0, 'advisor', '다람쥐', '다람쥐 사진 테스트 업로드', './static/uploads/', 'f3f88649f5f729031baada79d973f651.jpg', '다람쥐.jpg', 'a:4:{s:9:"file_size";i:12;s:11:"image_width";i:226;s:12:"image_height";i:150;s:8:"file_ext";s:4:".jpg";}', 4, '2013-02-16 05:48:25'),
	(3, 0, 'advisor', '벌 그림', '사진', './static/uploads/', '7b5dd6cfa920af8476db8ae47f9be405.jpg', 'thumb_2988812521.jpg', 'a:4:{s:9:"file_size";i:13;s:11:"image_width";i:226;s:12:"image_height";i:150;s:8:"file_ext";s:4:".jpg";}', 1, '2013-02-17 04:03:44'),
	(4, 0, 'advisor', '벌 그림', '사진', './static/uploads/', '6ec103f9fe1ec9bab2cc3d9a9433bc1a.jpg', 'thumb_2988812521.jpg', 'a:4:{s:9:"file_size";i:13;s:11:"image_width";i:226;s:12:"image_height";i:150;s:8:"file_ext";s:4:".jpg";}', 1, '2013-02-17 04:04:10'),
	(5, 0, 'advisor', '양복2', '사진2', './static/uploads/', 'c56ea3b24af2490ae3bc8d9e8605d02b.jpg', 'small2013877009.jpg', 'a:4:{s:9:"file_size";i:25;s:11:"image_width";i:140;s:12:"image_height";i:140;s:8:"file_ext";s:4:".jpg";}', 26, '2013-02-17 07:19:40'),
	(8, 5, 'advisor', '', '양복댓글1', '', '', '', '', 1, '2013-02-17 04:43:39'),
	(9, 5, 'advisor', '', '댓글2', '', '', '', '', 1, '2013-02-17 04:43:58'),
	(10, 5, 'advisor', '', '댓글3', '', '', '', '', 1, '2013-02-17 04:44:31'),
	(11, 5, 'advisor', '', '댓글4', '', '', '', '', 1, '2013-02-17 04:47:00'),
	(12, 5, 'advisor', '', '댓글5', '', '', '', '', 1, '2013-02-17 04:47:33'),
	(14, 0, 'advisor', 'codeigniter 로고', '불꽃', './static/uploads/', 'c437244b22242e46bc637209ea18aab8.png', 'logo_ci1.png', 'a:4:{s:9:"file_size";i:2;s:11:"image_width";i:48;s:12:"image_height";i:70;s:8:"file_ext";s:4:".png";}', 1, '2013-02-17 05:30:54'),
	(15, 0, 'advisor', '해파리', '모질라 로고\r\n\r\n공룡?!!\r\n\r\nhello', './static/uploads/', 'a9841c30413a85d8f65d597749729bf4.jpg', 'Jellyfish.jpg', 'a:4:{s:9:"file_size";i:757;s:11:"image_width";i:1024;s:12:"image_height";i:768;s:8:"file_ext";s:4:".jpg";}', 21, '2013-02-17 11:55:22'),
	(16, 0, 'advisor', '큰 이미지', '폭이 100px 보다 큰  이미지일 경우 썸네일 만듬.', './static/uploads/', 'e1f017a0c29a4c49ddce0e437b446bd5.jpg', 'Penguins.jpg', 'a:4:{s:9:"file_size";i:759;s:11:"image_width";i:1024;s:12:"image_height";i:768;s:8:"file_ext";s:4:".jpg";}', 7, '2013-02-17 11:53:00'),
	(17, 0, 'advisor', '사막', '사막', './static/uploads/', '6d6438a28c498f114ff8aa579a0e11e6.jpg', 'Desert.jpg', 'a:4:{s:9:"file_size";i:826;s:11:"image_width";i:1024;s:12:"image_height";i:768;s:8:"file_ext";s:4:".jpg";}', 1, '2013-02-17 11:53:53'),
	(18, 0, 'advisor', '국화', '국화', './static/uploads/', 'e1f4bfe01c582b09a99327d962eabaca.jpg', 'Chrysanthemum.jpg', 'a:4:{s:9:"file_size";i:858;s:11:"image_width";i:1024;s:12:"image_height";i:768;s:8:"file_ext";s:4:".jpg";}', 1, '2013-02-17 11:54:04'),
	(19, 0, 'advisor', '등대', '등대', './static/uploads/', '59c22ce0a390771c4f6a87e4db012c0e.jpg', 'Lighthouse.jpg', 'a:4:{s:9:"file_size";i:548;s:11:"image_width";i:1024;s:12:"image_height";i:768;s:8:"file_ext";s:4:".jpg";}', 3, '2013-02-17 11:54:50'),
	(20, 0, 'advisor', '코알라', '코알라', './static/uploads/', 'ad1a87a2d52d40e32fc5658bdff05310.jpg', 'Koala.jpg', 'a:4:{s:9:"file_size";i:762;s:11:"image_width";i:1024;s:12:"image_height";i:768;s:8:"file_ext";s:4:".jpg";}', 9, '2013-02-17 11:55:08');
