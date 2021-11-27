CREATE DATABASE php_ci3_book;
USE php_ci3_book;


CREATE TABLE `ci_board` (
  `board_id` int(10) NOT NULL AUTO_INCREMENT,
  `board_pid` int(10) NOT NULL DEFAULT '0' COMMENT '원글 번호',
  `user_id` varchar(20) NOT NULL COMMENT '작성자ID',
  `user_name` varchar(20) NOT NULL COMMENT '작성자 이름',
  `subject` varchar(50) NOT NULL COMMENT '게시글 제목',
  `contents` text NOT NULL COMMENT '게시글 내용',
  `hits` int(10) NOT NULL DEFAULT '0' COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '등록일',
  PRIMARY KEY (`board_id`),
  INDEX `board_pid` (`board_pid`)
) ENGINE=MyISAM COLLATE='utf8_general_ci' COMMENT='CodeIgniter 게시판';


INSERT INTO `ci_board`
	(`board_id`, `board_pid`, `user_id`, `user_name`, `subject`, `contents`, `hits`, `reg_date`)
VALUES
	(1, 0, 'advisor', '웅파', '안녕하세요', '첫글이네요.', 5, '2012-06-12 22:23:01'),
	(2, 0, 'advisor', '웅파', '두번째 글입니다.', '두번째글이네요.', 0, '2012-06-12 22:24:01'),
	(3, 0, 'advisor', '웅파', '세번째 글입니다.', '세번째글이네요.', 1, '2012-06-12 22:24:01'),
	(4, 0, 'advisor', '웅파', '네번째 글입니다.', '네번째글이네요.', 6, '2012-06-12 22:24:01'),
	(5, 0, 'advisor', '웅파', '다섯번째 글입니다.', '다섯번째글이네요.', 4, '2012-06-12 22:24:01'),
	(6, 0, 'advisor', '웅파', '여덞번째 글입니다.', '여덞번째글이네요.', 13, '2012-06-12 22:24:01'),
	(7, 0, 'advisor', '웅파', '아홉번째 글입니다.', '아홉번째글이네요.', 1, '2012-06-12 22:24:01'),
	(8, 0, 'advisor', '웅파', '열번째 글입니다.', '열번째글이네요.', 9, '2012-06-12 22:24:01'),
	(9, 1, 'blumine', '웅파2', '첫번째 글의 첫번째 댓글입니다.', '첫번째 댓글이네요.', 1, '2012-06-12 22:26:01'),
	(10, 1, 'blumine', '웅파2', '첫번째 글의 두번째 댓글입니다.', '두번째 댓글이네요.', 0, '2012-06-12 22:27:01'),
	(11, 2, 'blumine', '웅파2', '두번째 글의 첫번째 댓글입니다.', '두번째 글의 첫번째 댓글이네요.', 9, '2012-06-12 22:29:01'),
	(12, 4, 'advisor', 'advisor', '테스트1', '내용없음', 0, '2012-10-09 17:17:22'),
	(13, 4, 'advisor', 'advisor', '테스트2', '내용없음', 0, '2012-10-09 17:17:19'),
	(14, 4, 'advisor', 'advisor', '테스트3', '내용없음', 0, '2012-11-07 14:09:59');
