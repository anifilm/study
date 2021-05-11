(ns chap01.Ex-1-1-7) ; (use 'chap01.Ex-1-1-7)

(defn square [x] (* x x))

(defn abs [x]
  (if (< x 0) (- x) x))


; 1.1.7 연습: 뉴튼 법으로 제곱근 찾기

; 정의된 함수 불러오기 시에 위에서 아래로 순차적으로 불러오므로 정의 순서를 따라야 할 필요가 있어 순서를 재정의 함

(defn average [x y]
  (/ (+ x y) 2))

(defn improve [guess x]
  (average guess (/ x guess)))

(defn good-enough? [guess x]
  (< (abs (- (square guess) x)) 0.001))

(defn sqrt-iter [guess x]
  (if (good-enough? guess x)
    guess
    (sqrt-iter (improve guess x)
      x)))

(defn sqrt [x]
  (sqrt-iter 1.0 x))


(sqrt 9)
; 3.00009155413138

(sqrt (+ 100 37))
; 11.704699917758145

(sqrt (+ (sqrt 2) (sqrt 3)))
; 1.7739279023207892

(sqrt (sqrt 1000))
; 5.623413773109398
