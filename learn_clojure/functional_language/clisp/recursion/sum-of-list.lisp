; 리스트의 합을 구하는 재귀 함수

(defun sum-of-list (input-list)
  (if (null input-list)
    0
    (+
      (CAR input-list)
      (sum-of-list (CDR input-list)))))

(sum-of-list '(1 2 3))
; 6
