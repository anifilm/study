-- INNER JOIN (내부 조인)

-- 영화 감독 테이블을 전부 보여준다.
-- 영화 리스트 테이블을 내부 조인 한다.
-- 조건은 영화 감독 아이디와 영화 리스트의 영화 감독 아이디를 일치시킨다.
SELECT * FROM movie_director INNER JOIN movie_list
ON movie_director.id=movie_list.director_id;

-- MySQL에서 JOIN, INNER JOIN, CROSS JOIN의 결과는 동일하다.
SELECT * FROM movie_director JOIN movie_list
ON movie_director.id=movie_list.director_id;

-- MySQL에서만 사용할 수 있는 방식 (실행 결과는 동일하다.)
SELECT * FROM movie_director, movie_list
WHERE movie_director.id=movie_list.director_id;

-- 별칭(alias)을 사용한 예
SELECT * FROM movie_director AS a, movie_list AS b
WHERE a.id=b.director_id;

-- `movie_director` 테이블의 `name` 필드의 값이 '박찬욱'인 레코드의
-- `opening_day` 필드를 기준으로 오름차순 정렬하여 가져온다.
SELECT * FROM movie_director JOIN movie_list
ON movie_director.id=movie_list.director_id
WHERE movie_director.name='박찬욱'
ORDER BY movie_list.opening_day ASC;
