-- 람다 함수
-- 람다 함수를 반환하는 함수
functionAsOutput :: Int -> (Int -> Int)
functionAsOutput x = (\y -> y + x)
