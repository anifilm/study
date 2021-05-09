-- 팩토리얼을 반환하는 재귀 함수
factorial :: Int -> Int
factorial 0 = 1
factorial n = n * factorial (n - 1)
