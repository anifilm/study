(ns examples.make-set)

;;
;; 2.5.2 def와 defn으로 명명된 함수 생성하기
;;

(def make-set
  (fn [x y]
    (println "Making a set")
    #{x y}))

(make-set 1 2)
; Making a set
;=> #{1 2}
