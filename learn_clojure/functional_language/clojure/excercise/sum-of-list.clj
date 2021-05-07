; 연습 문제
; 리스트의 합을 구하는 재귀 함수 sum-of-list의 본문을 완성하라.

(defn sum-of-list [list]
  (if (empty? list)
    0
    (+ (first list)
       (sum-of-list (rest list)))))

(sum-of-list '(1 2 3 4 5)) ; 재귀 함수 사용
; 15


(reduce sum '(4 3 2 5 1)) ; 리스트의 합을 반환
; 15
