; 연습 문제
; 숫자로 구성된 리스트를 입력으로 받아 짝수인 숫자만 포함된 리스트를 반환하는 재귀 함수 filter-odd
; 를 작성하라.

(defun filter-odd (input-list)
  (cond
    ((null input-list) nil)
    ((= (mod (car input-list) 2) 0)
      (cons
        (car input-list)
        (filter-odd (cdr input-list))))
    (t (filter-odd (cdr input-list)))))

(filter-odd '(1 2 3 4 5))
; (2 4)
