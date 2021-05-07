-- 연습 문제
-- 다음 예와 같이 리스트의 최대값을 구하는 재귀 함수 maxOfList를 하스켈로 작성하라.

maxOfList :: [Int] -> Int
maxOfList [] = 0
maxOfList (a:x)
  | maxOfList x > a = maxOfList x
  | otherwise       = a

-- maxOfList [1, 2, 3]
-- 3
