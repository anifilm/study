; 연습 문제
; 함수와 리스트를 입력으로 받아 리스트의 각 요소에 함수를 적용한 결과를 리스트로 반환하는 고차 함수
; 인 my-map을 재귀적으로 작성하여 본문을 완성하라.

(defn my-map [fp list]
  (if (empty? list)
    nil
    (cons
      (fp (first list))
      (my-map (rest list)))))

(my-map (fn [x] (+ x 1)) '(1 2 3))
; (2 3 4)
