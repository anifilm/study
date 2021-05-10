(ns examples.exploring
  (:require [clojure.string :as str])
  (:import (java.io File)))

; (use 'examples.exploring) 네임스페이스 없이 사용 하도록 파일 불러오기
; (use :reload 'examples.exploring) 라이브러리 다시 불러오기
(defn greeting
  "Returns a greeting of the form 'Hello, username.'"
  [username]
  (str "Hello, " username))

; 이름이 같은 함수라도 인자 개수가 다르다면, 서로를 호출할 수 있다. (함수 오버로딩)
; 인자가 없는 경우에 대한 함수 처리
(defn greeting
  "Returns a greeting of the form 'Hello, username.'
   Default username is 'world'."
  ([] (greeting "world")) ; 인자가 없는 경우
  ([username] (str "Hello, " username)))

; 인자 리스트에 &를 사용하면 가변 인자를 받는 함수를 만들 수 있다.
; 매개변수에 일대일로 바인딩되지 못한, 모든 나머지 인자들의 시퀀스가 & 뒤의 매개변수에
; 바인딩된다.
(defn date [person-1 person-2 & chaperones]
  (println person-1 "and" person-2
    "went out with" (count chaperones) "chaperones."))

(defn indexable-word? [word]
  (> (count word) 2))
; indexable-word?를 사용하면 색인이 될 단어를 뽑아낼 수 있다.
;(filter indexable-word? (str/split "A fine day it is" #"\W+"))

(defn indexable-words [text]
  (let [indexable-word? (fn [w] (> (count w) 2))]
    (filter indexable-word? (str/split text #"\W+"))))

(defn make-greeter [greeting-prefix]
  (fn [username] (str greeting-prefix ", " username)))
;(def hello-greeting (make-greeter "Hello"))
;(def aloha-greeting (make-greeter "Aloha"))
;(hello-greeting "world")
;(aloha-greeting "world")
;((make-greeter "Howdy") "pardner")

(defn greet-author-1 [author]
  (println "Hello," (:first-name author)))

(defn greet-author-2 [{fname :first-name}]
  (println "Hello," fname))

(defn ellipsize [words]
  (let [[w1 w2 w3] (str/split words #"\s+")]
    (str/join " " [w1 w2 w3 "..."])))

;(defn is-small? [number]
;  (if (< number 100) "yes"))

;(defn is-small? [number]
;  (if (< number 100) "yes" "no"))

(defn is-small? [number]
  (if (< number 100)
    "yes"
    (do ; false 인 경우 여러 줄에 걸쳐서 코드를 실행하도록 한다.
      (println "Saw a big number" number)
      "no")))

;(loop [result [] x 5]
;  (if (zero? x)
;    result
;    (recur (conj result x) (dec x))))
; conj -> result 벡터에 x의 값을 연결
; dec  -> x의 값을 1 감소
; (inc -> 값을 1 증가)

(defn countdown [result x]
  (if (zero? x)
    result
    (recur (conj result x) (dec x))))

; for loop 매크로
;(for [i (range 10)] (inc i))

; for loop 매크로, 두 번째
;(doseq [i (for [i (range 10)] (inc i))]
;  (println "i =" i))
