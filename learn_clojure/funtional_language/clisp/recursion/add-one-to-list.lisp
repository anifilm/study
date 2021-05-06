; 리스트를 반환하는 재귀 함수

(defun add-one-to-list (input-list)
  (if (null input-list)
    NIL
    (cons
      (+ 1 (CAR input-list))
      (add-one-to-list (CDR input-list)))))
