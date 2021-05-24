(def size 8)

(doseq [i (range size)]
  (if (= 0 (mod i 2))
    (println " # # # #")
    (println "# # # # ")))
