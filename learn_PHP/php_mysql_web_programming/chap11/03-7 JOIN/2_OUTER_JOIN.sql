-- LEFT OUTER JOIN (왼쪽 외부 조인)

-- 영화 감독 테이블을 전부 보여준다.
-- 영화 리스트 테이블을 왼쪽 외부 조인 한다.
-- 조건은 영화 감독 아이디와 영화 리스트의 영화 감독 아이디를 일치시킨다. (조건 값이 일치하지 않는 경우는 NULL로 표시)
-- `birthday` 필드의 값이 '1970-01-01' 이전인 레코드만 가져온다.
SELECT * FROM movie_director LEFT JOIN movie_list
ON movie_director.id=movie_list.director_id
WHERE birthday < '1970-01-01';

-- 별칭(aliad) 사용, 가져올 필드를 직접 선택
SELECT a.id, a.name, a.birthday, b.id, b.title, b.opening_day, b.director_id
FROM movie_director AS a LEFT JOIN movie_list AS b
ON a.id=b.director_id;


-- RIGHT OUTER JOIN (오른쪽 외부 조인)

SELECT * FROM movie_director RIGHT JOIN movie_list
ON movie_director.id=movie_list.director_id;
