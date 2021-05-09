; 변수 (전역 변수)
; - defvar (값을 한번만 할당 가능, 재할당은 무시)
; - defparameter (값을 여러번 할당 가능)

(defvar x 123)

x
; 123

(defvar x 500) ; 재할당은 무시된다.

x
; 123


(defparameter y 123)

(defparameter y 500)

y
; 500

; 전역 변수는 어디에서나 사용 가능
(+ x 3)
; 126

(+ y 3)
; 503


; (지역 변수)
; - let
; - let*

(let ((x 1))
  (+ x 1))
; 2

(let ((x 1) (y 2))
  (+ x y))
; 3

; let*를 사용하면 지역 변수에 값을 할당 시 다른 지역 변수 값을 상호 참조할 수 있다.
(let* ((x 1) (y x))
  (print y))
; 1
