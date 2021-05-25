(ns examples.arity2)

;;
;; 2.5.3 인수를 여러 개 갖는 함수
;;

(defn arity2+ [first second & more] ; 둘 또는 그 이상의 인자를 취하는 함수 정의
  (vector first second more))

(arity2+ 1 2)
;=> [1 2 nil] ; 추가 인자는 nil

(arity2+ 1 2 3 4)
;=> [1 2 (3 4)] ; 추가 인자는 리스트

(arity2+ 1) ; 너무 적은 인자가 입력되면 에러 발생
;=> Wrong number of args (1) passed to: user/arity2+
