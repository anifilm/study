(ns examples.a-to-j)

;;
;; 5.2.2 큰 벡터
;;

(def a-to-j (vec (map char (range 65 75)))) ; 아스키(ASCII) 코드로 문자를 만듬

a-to-j
;=> [\A \B \C \D \E \F \G \H \I \J]

(nth a-to-j 4)
;=> \E
(get a-to-j 4)
;=> \E
(a-to-j 4)
;=> \E


(seq a-to-j)
;=> (\A \B \C \D \E \F \G \H \I \J)

(rseq a-to-j)
;=> (\J \I \H \G \F \E \D \C \B \A)


(assoc a-to-j 4 "no longer E")
;=> [\A \B \C \D "no longer E" \F \G \H \I \J]


(replace {2 :a, 4 :b} [1 2 3 2 3 4])
;=> [1 :a 3 :a 3 :b]


(def matrix
  [[1 2 3]
   [4 5 6]
   [7 8 9]])

(get-in matrix [1 2])
;=> 6

(assoc-in matrix [1 2] 'x)
;=> [[1 2 3] [4 5 x] [7 8 9]]

(update-in matrix [1 2] * 100)
;=> [[1 2 3] [4 5 600] [7 8 9]]
