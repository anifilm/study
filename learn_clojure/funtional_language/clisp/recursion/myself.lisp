; 재귀 함수의 정의

(defun myself (x)
  (if (> x 10)
    "finish"
    (progn
      (print x)
      (myself (+ 1 x)))))

(myself 0)
; 0
; 1
; 2
; 3
; 4
; 5
; 6
; 7
; 8
; 9
; 10
; "finish"
