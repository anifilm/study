; 1.1.4 묶음 프로시저

(defn square [x]
  (* x x))

(square 21)
; 441
(square (+ 2 5))
; 49
(square (square 3))
; 81

(defn sum-of-squares [x y]
  (+ (square x) (square y)))

(sum-of-squares 3 4)
; 25

(defn f [a]
  (sum-of-squares (+ a 1) (* a 2)))

(f 5)
; 136
