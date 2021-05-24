(def fizz? #(zero? (mod % 3)))
(def buzz? #(zero? (mod % 5)))
(def fizzbuzz? #(and (fizz? %) (buzz? %)))

; Solution 1
(def fizzbuzz
  #(cond
    (fizzbuzz? %) "FizzBuzz"
    (fizz? %) "Fizz"
    (buzz? %) "Buzz"
    :else %))

(map fizzbuzz (range 1 101))

; Solution 2
(defn fizzbuzz [n]
  (let [s (str (if (fizz? n) "Fizz")
               (if (buzz? n) "Buzz"))]
    (if (empty? s) n s)))

; Solution 3
(defn fizzbuzz [n]
  (let [to-words (some-fn #(when (fizzbuzz? %) "FizzBuzz")
                          #(when (fizz? %) "Fizz")
                          #(when (buzz? %) "Buzz"))]
    (or (to-words n) n)))

; Solution 4
(defn fizzbuzz
  ([n] (fizzbuzz n (array-map fizz? "Fizz" buzz? "Buzz")))
  ([n lookup]
    (if-let [matches (seq (keep (fn [[pred? word]] (when (pred? n) word)) lookup))]
      (apply str matches)
      n)))
