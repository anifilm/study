(ns kata)

(defn greet [name]
  (str "Hello, " name " how are you doing today?"))


(ns hello-test
  (:require [clojure.test :refer :all]
            [kata :refer :all]
            [clojure.string :as str]))

(deftest simple-test
  (is (= (greet "John") "Hello, John how are you doing today?"))
  (is (= (greet "Alice") "Hello, Alice how are you doing today?"))
  (is (= (greet "Bob") "Hello, Bob how are you doing today?")))
