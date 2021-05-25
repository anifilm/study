(ns examples.do)

;;
;; 2.6.1 블록
;;

(do
  (def x 5)
  (def y 4)
  (+ x y)
  [x y])
;=> [5 4]
