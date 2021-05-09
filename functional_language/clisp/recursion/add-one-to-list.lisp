; 리스트를 반환하는 재귀 함수

(defun add-one-to-list (input-list)
  (if (null input-list)
    nil
    (cons
      (+ 1 (car input-list))
      (add-one-to-list (cdr input-list)))))
