(doseq [i (range 1 101)]
  (cond
    (and (= 0 (mod i 3)) (= 0 (mod i 5))) (prn "FizzBuzz")
    (= 0 (mod i 3)) (prn "Fizz")
    (= 0 (mod i 5)) (prn "Buzz")
    :else (prn i)))
