-- 고차함수 map을 재귀 함수로 직접 정의
mymap :: (a -> b) -> [a] -> [b]
mymap fp [] = []
mymap fp [a] = [fp a]
mymap fp (head:tail) = fp head : mymap fp tail

-- > mymap (\x -> x + 1) [1,2,3]
-- [2,3,4]
