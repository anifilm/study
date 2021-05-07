; 리스트의 최대값 구하기

(defun max-of-list (input-list)
  (cond
    ((null input-list) "NON SENSE")
    ((= 1 (list-length input-list)) (car input-list))
    ((< 1 (list-length input-list))
      (max
        (car input-list)
        (max-of-list (cdr input-list)))))

(max-of-list '(3 1 8 2 6))
; 8
