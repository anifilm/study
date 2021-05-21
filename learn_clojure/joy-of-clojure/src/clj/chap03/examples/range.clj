(ns examples.range)

(range 5)
;=> (0 1 2 3 4)

(for [x (range 2) y (range 2)] [x y])
;=> ([0 0] [0 1] [1 0] [1 1])

(bit-xor 1 2)
;=> 3

(for [x (range 2) y (range 2)]
  [x y (bit-xor x y)])
;=> ([0 0 0] [0 1 1] [1 0 1] [1 1 0])

(defn xors [max-x max-y]
  (for [x (range max-x) y (range max-y)]
    [x y (bit-xor x y)]))

(xors 2 2)
;=> ([0 0 0] [0 1 1] [1 0 1] [1 1 0])
