(ns kata)

(defn flip [d a]
  (if (= d \R)
    (sort a)
    (sort > a)))


(ns kata.test
  (:require [clojure.test :refer :all]
            [kata         :refer [flip]]))

(deftest basic-tests
         (is (= (flip \R [4 5 6 7 1]) [1 4 5 6 7]))
         (is (= (flip \L [3 0 9 8 1 2]) [9 8 3 2 1 0]))
         (is (= (flip \L [0 0 12 0 1]) [12 1 0 0 0]))
         (is (= (flip \R [13 2 4 7 93]) [2 4 7 13 93]))
         (is (= (flip \R [5 4 3 2 1]) [1 2 3 4 5])))
