; 단어 세기

; 파일을 불러온뒤 리스트에 개행 단위로 저장
(require '[clojure.string :as str])

(def content
  (slurp "./textfile.txt"))

(def line-list
  (str/split content #"\r\n"))


; mapcat을 사용하여 단어 단위로 리스트에 저장
(def word-list
  (mapcat
    (fn [line] (str/split line #" "))
    line-list))

word-list
; ("I" "like" "functional" "programming." "Do" "you" "like" "functional" "programming" "too?"")


; 단어들의 개수를 세기 (reduce 사용)
(reduce
  (fn [acc-map elem]
    (if (nil? (get acc-map elem))
      (assoc acc-map elem 1)
      (update acc-map elem inc)))
  {}
  word-list)
; {"I" 1, "like" 2, "functional" 2, "programming." 1, "Do" 1, "you" 1, "programming" 1, "too?" 1}

(println word-list)
