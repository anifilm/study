; 연습 문제
; 숫자로 구성된 리스트를 입력으로 받아 짝수인 숫자만 포함된 리스트를 반환하는 재귀 함수 filter-odd
; 를 작성하라. 입력과 출력 예는 다음과 같다.

(defun filter-odd (input-list)
  (cond
    ((null input-list) NIL)
    ((= (mod (CAR input-list) 2) 0)
      (cons
        (CAR input-list)
        (filter-odd (CDR input-list))))
    (t (filter-odd (CDR input-list)))))

(filter-odd '(1 2 3 4 5))
; (2 4)
