(ns exmaples.re-seq)

;;
;; 4.5.2 정규 표현식 함수
;;

(re-seq #"\w+" "one-two/three")
;=> ("one" "two" "three")

(re-seq #"\w*(\w)" "one-two/three")
;=> (["one" "e"] ["two" "o"] ["three" "e"])
