-- 연습 문제
-- 다음 예와 같이 리스트의 n번째 값을 반환하는 재귀 함수 nth를 하스켈로 작성하라.

nth :: [Int] -> Int -> Int
nth [] _ = 0
nth list 0 = 0
nth list 1 = head list
nth list n = nth (tail list) (n-1)

-- nth [1, 2, 3] 2
-- 2
