; 연습 문제
; 입력 리스트의 각 요소를 중복 삽인한 리스트를 반환하는 재귀 함수 duplicate-elem을 작성하라.
; 입력과 출력 예는 다음과 같다.

(defun duplicate-elem (input-list)
  (if (null input-list)
    NIL
    (cons (CAR input-list)
      (cons (CAR input-list)
      (duplicate-elem (CDR input-list))))))

(duplicate-elem '(1 2 3))
; (1 1 2 2 3 3)
