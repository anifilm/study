(ns joy.print-seq)

(defn print-seq [s]
  (when (seq s)
    (prn (first s))
    (recur (rest s))))
