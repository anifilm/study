(ns kata)
(defn greet [name_ owner]
  (if (= name_ owner)
    "Hello boss"
    "Hello guest"))


(ns kata.test
  (:require [kata :refer :all]
            [clojure.test :refer :all]))

(defn tester [a b exp]
  (testing (str "(greet \"" a "\" \"" b "\")")
    (is (= (greet a b) exp))))

(deftest basic-tests
  (tester "Daniel" "Daniel" "Hello boss")
  (tester "Greg" "Daniel" "Hello guest"))
