; 리스트와 벡터
; - 리스트 (Linked List)
; '(a b c)
; - 벡터 (Vector)
; [a b c]

; first / rest (next) -> 리스프의 CAR / CDR

(first '(1 2 3))
; 1
(rest '(1 2 3))
; (2 3)

; 벡터에도 동일하게 적용

(first [1 2 3])
; 1

(rest [1 2 3])
; (2 3)
