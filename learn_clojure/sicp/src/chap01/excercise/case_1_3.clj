; 연습문제 1.3
; 세 숫자를 인자로 받아 그 가운데 큰 숫자 두 개를 제곱한 다음, 그 두 값을 덧셈하여 내놓는 프로시저를 정의하라.

(defn max2 [x y]
  (if (> x y) x y))

(defn max3 [a b c]
  (max2 a (max2 b c)))

(max3 1 2 3)
