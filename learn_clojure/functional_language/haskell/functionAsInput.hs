-- 람다 함수
-- 람다 함수를 입력 인자로 받아들이는 함수
functionAsInput :: (Int -> Int) -> Int -> Int
functionAsInput fp x = fp x
