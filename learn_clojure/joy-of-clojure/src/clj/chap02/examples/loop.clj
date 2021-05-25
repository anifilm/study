(ns examples.loop)

;;
;; 2.6.3 반복
;;

;; 재귀

(defn print-down-from [x]
  (when (pos? x) ; x가 양수인 동안 반복
    (println x)  ; 현재 x를 출력
    (recur (dec x)))) ; x에서 1을 뺀 후 다시 반복

(print-down-from 5)
; 5
; 4
; 3
; 2
; 1
;=> nil

(defn sum-down-from [sum x] ; 계산할 값을 지정
  (if (pos? x) ; if 양수이면
    (recur (+ sum x) (dec x)) ; then 반복(재귀)
    sum))      ; else 합을 반환

(sum-down-from 0 10)
;=> 55


;; 루프

(defn sum-down-from [initial-x]
  (loop [sum 0, x initial-x] ; 재귀 대상을 지정
    (if (pos? x)
      (recur (+ sum x) (dec x)) ; 재귀 대상으로 이동(반복)
      sum)))

(sum-down-from 10)
;=> 55
