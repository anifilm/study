(ns examples.my-stack)

;;
;; 5.2.3 스택으로서의 벡터
;;

(def my-stack [1 2 3])

(peek my-stack)
;=> 3

(pop my-stack)
;=> [1 2]

(conj my-stack 4)
;=> [1 2 3 4]

(+ (peek my-stack) (peek (pop my-stack)))
;=> 5
