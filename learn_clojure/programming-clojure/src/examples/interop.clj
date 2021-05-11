(ns examples.interop)

; (use 'examples.interop)
; (use :reload 'examples.interop)
(defn sum-to [n]
  (loop [i 1 sum 0]
    (if (<= i n)
      (recur (inc i) (+ i sum))
      sum)))

(defn integer-sum-to [n]
  (let [n (int n)]
    (loop [i (int 1) sum (int 0)]
      (if (<= i n)
        (recur (inc i) (+ i sum))
        sum))))

(defn unchecked-sum-to [n]
  (let [n (int n)]
    (loop [i (int 1) sum (int 0)]
      (if (<= i n)
        (recur (inc i) (unchecked-add i sum))
        sum))))

(defn better-sum-to [n]
  (reduce + (range 1 (inc n))))

(defn best-sum-to [n]
  (/ (* n (inc n)) 2))

;(defn describe-class [c]
;  {:name (.getName c)
;   :final (java.lang.reflect.Modifier/isFinal (.getModifiers c))})

(defn describe-class [#^Class c]
  {:name (.getName c)
   :final (java.lang.reflect.Modifier/isFinal (.getModifiers c))})

; 모든 자연수를 시퀀스로 반환
(defn whole-numbers [] (iterate inc 1))
