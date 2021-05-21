(ns kata)

(defn even-or-odd [number]
  (if (even? number) "Even" "Odd"))


(ns example-test
  (:require [clojure.test :refer :all]
            [kata :refer :all]))

(deftest Examples...
  (is (= (even-or-odd 2) "Even"))
  (is (= (even-or-odd 0) "Even"))
  (is (= (even-or-odd 7) "Odd"))
  (is (= (even-or-odd 1) "Odd"))
  (is (= (even-or-odd -1) "Odd")))
