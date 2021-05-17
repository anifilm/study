; loop

(loop [iteration 0]
  (println (str "Iteration " iteration))
  (if (> iteration 3)
    (println "Goodbye!")
    (recur (inc iteration))))
; => Iteration 0
; => Iteration 1
; => Iteration 2
; => Iteration 3
; => Iteration 4
; => Goodbye!

; 일반 함수를 사용하여 위와 동일한 재귀 함수를 구현할 수 있다.
(defn recursive-printer
    [iteration]
    (println iteration)
    (if (> iteration 3)
      (println "Goodbye!")
      (recursive-printer (inc iteration))))

(recursive-printer 0)


(defn recursive-printer
  ([] ; 매개 변수가 없다면
     (recursive-printer 0)) ; 기본값을 선언하여 함수 재귀 호출
  ([iteration] ; 매개 변수의 값을 지정한 경우
     (println iteration)
     (if (> iteration 3)
       (println "Goodbye!")
       (recursive-printer (inc iteration)))))

(recursive-printer)
