(ns examples.vector)

;;
;; 5.2.1 벡터 만들기
;;

(vec (range 10))
;=> [0 1 2 3 4 5 6 7 8 9]

(let [my-vector [:a :b :c]]
  (into my-vector (range 10)))
;=> [:a :b :c 0 1 2 3 4 5 6 7 8 9]


(into (vector-of :int) [Math/PI 2 1.3])
;=> [3 2 1]

(into (vector-of :char) [100 101 102])
;=> [\d \e \f]

(into (vector-of :int) [1 2 623876371267813267326786327863])
; Value out of range for long: 623876371267813267326786327863
