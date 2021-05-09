-- 연습 문제
-- 고차 함수 foldl를 재귀 함수로 구현하라.

myfoldl :: (a -> b -> a) -> a -> [b] -> a
myfoldl fp a [] = a
myfoldl fp a (head:tail) = myfoldl fp (fp a head) tail

-- > myfoldl (\x y -> x + y) 0 [1,2,3]
-- 6
