-- 연습 문제
-- 리스프의 재귀 함수에서 배웠던 피보나치 수를 구하는 함수를 하스켈로 작성하라.

fibo :: Int -> Int
fibo 1 = 1
fibo 2 = 1
fibo n = fibo (n - 1) + fibo (n - 2)
