-- SUB QUERY

-- 감독이 '박찬욱'인 영화 정보만 가져온다.
SELECT title, opening_day FROM movie_list
WHERE director_id=(SELECT id FROM movie_director WHERE name='박찬욱');

-- 영화 제목에 '씨'라는 글자가 들어있는 영화의 감독 정보를 가져온다.
SELECT * FROM movie_director
WHERE id=(SELECT director_id FROM movie_list WHERE title LIKE '%씨%');
-- 서브 쿼리의 결과가 하나 이상이라면 오류 발생!!!

-- WHERE 절 뒤에 IN 키워드를 추가
SELECT * FROM movie_director
WHERE id IN (SELECT director_id FROM movie_list WHERE title LIKE '%씨%');

-- SUB QUERY가 JOIN와 다른 점은 SELECT, INSERT, UPDATE, DELETE가 모두 가능하다는 것이다.

-- 영화 제목에 '씨'라는 글자가 들어있는 영화 감독을 삭제
-- `movie_director` 테이블의 `name` 필드 값이 '박찬욱'인 레코드가 삭제된다.
DELETE FROM movie_director
WHERE id IN (SELECT director_id FROM movie_list WHERE title LIKE '%씨%');
