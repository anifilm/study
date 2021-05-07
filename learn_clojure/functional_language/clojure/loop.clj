; 반복문
; - dotimes

(dotimes [x 5]
  (println x))
; 0
; 1
; 2
; 3
; 4
; nil


; - loop / recur

(loop [x 1 ret 0]
  (if (> x 10) ret
    (recur (inc x) (+ ret x))))
; 55


; factorial 함수를 재귀 함수와 recur로 각각 구현

(defn factorial [n]
  (if (= 1 n) 1
    (* n (factorial (dec n)))))

(defn factorial [x]
  (loop [n x prod 1]
    (if (= 1 n) prod
      (recur (dec n) (* prod n)))))
