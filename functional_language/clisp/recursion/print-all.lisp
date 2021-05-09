; 리스트의 모든 요소를 출력하는 재귀 함수

(defun print-all (input-list)
  (if (null input-list)
    "finish"
    (progn
      (print (car input-list))
      (print-all (cdr input-list)))))

(print-all '(1 2 3))
; 1
; 2
; 3
; "finish"
