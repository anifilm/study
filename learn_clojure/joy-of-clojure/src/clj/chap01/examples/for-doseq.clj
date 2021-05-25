(ns examples.for-doseq)

;;
;; 1.1.5 일관성
;;

(for [x [:a :b], y (range 5) :when (odd? y)]
  [x y])
;=> ([:a 1] [:a 3] [:b 1] [:b 3])

(doseq [x [:a :b], y (range 5) :when (odd? y)]
  (prn x y))
; :a 1
; :a 3
; :b 1
; :b 3
;=> nil
