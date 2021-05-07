; 큰 파일에 대한 단어 세기

(require '[clojure.java.io :as io])
(require '[clojure.string :as str])

(defn split-by-space [line] (str/split line #" "))
(defn merge-sum-map [map1 map2] (merge-with + map1 map2))

(defn split-and-merge [map line]
  (merge-sum-map
    map
    (frequencies (split-by-space line))))

(defn wordcount [filename]
  (with-open [rdr (io/reader filename)]
    (let [biglazylist (line-seq rdr)]
      (doall
        (reduce
          (fn [acc-map line]
            (split-and-merge acc-map line))
          {}
          biglazylist)))))

(wordcount "./bigfile.txt")
