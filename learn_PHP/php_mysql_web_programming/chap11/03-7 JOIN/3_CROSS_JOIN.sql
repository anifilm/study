-- CROSS JOIN (교차 조인)
-- 양쪽 테이블의 필드에 대한 모든 조합 결과를 가져온다.
-- A={a, b, c, d}, B={1, 2, 3} 일 때 A CROSS JOIN B는
-- (a,1), (a,2), (a,3), (b,1), (b,2), (b,3), (c,1), (c,2), (c,3), (d,1), (d,2), (d,3)

SELECT * FROM movie_director CROSS JOIN movie_list;

SELECT * FROM movie_director AS a CROSS JOIN movie_list AS birthday
WHERE a.name='박찬욱';
