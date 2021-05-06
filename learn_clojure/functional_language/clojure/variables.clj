; 변수 (전역 변수)
; - def (리스프의 defparameter와 동일)

(def x 12)

x
; 12

(def x 15)

x
; 15


; (지역 변수)
; - let

(let [x 1 y 2]
  (+ x y))
; 3

; 다음 두 식은 동일한 효과를 가진다.
(let [[x 1] [y 2]]
  (+ x y))
; 3

(let [[x y] [1 2]]
  (+ x y))
; 3
