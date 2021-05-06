; 연습 문제
; 리스트와 임의의 숫자를 입력으로 받아 해당 숫자가 리스트에 있으면 "yes" 없으면 "no"를 반환하는
; 재귀 함수 is-exist를 작성하라. 입력과 출력 예는 다음과 같다.

(defun is-exist (input-list n)
  (cond
    ((null input-list) "no")
    ((= n (CAR input-list)) "yes")
    (t (is-exist (CDR input-list) n))))

(is-exist '(1 2 3) 3)
; "yes"
(is-exist '(1 2 3) 4)
; "no"
