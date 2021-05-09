; 큰 파일에 대한 단어 세기
; - reader와 line-seq

(require '[clojure.java.io :as io])
(require '[clojure.string :as str])

(with-open [rdr (io/reader "./textfile.txt")]
  (dorun
    (map println (line-seq rdr))))


(with-open [rdr (io/reader "./bigfile.txt")]
  (reduce
    (fn [size line] (+ size (count line)))
    0
    (line-seq rdr)))
