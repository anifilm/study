(ns kata
  (:require [clojure.string :as str]))

(defn reverse-words [words]
  (str/join " " (reverse (str/split words #" "))))


(ns kata.test
  (:require [clojure.test :refer :all]
            [kata         :refer [reverse-words]]))

(deftest basic-tests
  (is (= (reverse-words "hello world!")                , "world! hello"))
  (is (= (reverse-words "yoda doesn't speak like this"), "this like speak doesn't yoda"))
  (is (= (reverse-words "foobar")                      , "foobar"))
  (is (= (reverse-words "kata editor")                 , "editor kata"))
  (is (= (reverse-words "row row row your boat")       , "boat your row row row")))
