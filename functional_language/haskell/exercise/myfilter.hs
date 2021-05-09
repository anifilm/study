-- 연습 문제
-- 고차 함수 filter를 재귀 함수로 구현하라.

myfilter :: (a -> Bool) -> [a] -> [a]
myfilter _ [] = []
myfilter fp (head:tail) = if fp head
                          then head : myfilter fp tail
                          else myfilter fp tail

-- > myfilter (\x -> even x) [1,2,3]
-- [2]
