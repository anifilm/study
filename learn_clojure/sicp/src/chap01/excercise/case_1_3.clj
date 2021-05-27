; 연습문제 1.3
; 세 숫자를 인자로 받아 그 가운데 큰 숫자 두 개를 제곱한 다음, 그 두 값을 덧셈하여 내놓는 프로시저를 정의하라.

;; scheme source
;;(define (sum-square-two-largest lst)
;;  (~> lst
;;    (sort >)
;;    (take 2)
;;    (map (λ (x) (* x x)) _)
;;    (foldl + 0 _)))

(defn sum-square-two-largest [lst]
  (let [x (take 2 (sort > lst))]
    (reduce + (map #(* % %) x))))
