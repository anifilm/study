; 단어 세기
; - mapcat

(require '[clojure.string :as str])

(map
  (fn [line] (str/split line #" "))
  '("a b", "c d"))
; (["a" "b"] ["c" "d"])

(mapcat
  (fn [line] (str/split line #" "))
  '("a b c", "d e f"))
; ("a" "b" "c" "d" "e" "f")


; mapcat을 사용하여 단어 단위로 리스트에 저장
(def word-list
  (mapcat
    (fn [line] (str/split line #" "))
    line-list))

word-list
; ("I" "like" "functional" "programming." "Do" "you" "like" "functional" "programming" "too?")
