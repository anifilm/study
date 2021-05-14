; Destructuring (let, Part 2)

(def v [42 "foo" 99.2 [5 12]])

(first v)
; 42
(second v)
; "foo"
(last v)
; [5 12]

(nth v 2)
; 99.2
(v 2)
; 99.2
(.get v 2)
; 99.2
