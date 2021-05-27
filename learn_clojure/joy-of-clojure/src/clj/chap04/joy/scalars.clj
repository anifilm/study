(ns joy.scalars)

;;
;; 예제 4.1
;;

(defn pour [lb ub]
  (cond
    (= ub :toujours) (iterate inc lb)
    :else (range lb ub)))

(pour 1 10)
;=> (1 2 3 4 5 6 7 8 9) ; 상한 값, 하한 값과 함께 호출하면 범위를 반환

(pour 1 :toujours) ; 키워드와 함께 호출하면 영원히 반복함
; ... runs forever
