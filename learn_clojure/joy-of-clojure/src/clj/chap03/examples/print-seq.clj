(ns examples.print-seq)

(defn print-seq [s]
  (when (seq s)
    (prn (first s))
    (recur (rest s))))

(print-seq [1 2])
; 1
; 2
;=> nil
