; 연습 문제
; 리스트의 최대값을 구하는 재귀 함수 max-of-list의 본문을 완성하라.

(defn max-of-list [list]
  (cond
    (empty? list) "NON SENSE"
    (= 1 (count list)) (first list)
    (< 1 (count list))
      (max
        (first list)
        (max-of-list (rest list)))))

(max-of-list '(4 3 2 5 1)) ; 재귀 함수 사용
; 5


(apply max '(4 3 2 5 1))  ; 리스트의 최대값 반환
; 5

(reduce max '(4 3 2 5 1)) ; 리스트의 최대값 반환, 두 번째
; 5
