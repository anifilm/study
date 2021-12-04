-- UNION

-- 두 테이블에서 `name` 필드만 UNION을 사용하여 하나의 테이블로 가져온다.
-- 중복은 제외된다.
SELECT name FROM movie_director
UNION
SELECT name FROM sm_table;

-- 중복허용은 ALL 키워드 사용
SELECT name FROM movie_director
UNION ALL
SELECT name FROM sm_table;
