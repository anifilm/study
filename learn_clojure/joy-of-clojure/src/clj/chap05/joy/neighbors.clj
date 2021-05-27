(ns joy.neighbors)

;;
;; 예제 5.1
;;

(defn neighbors
  ([size yx] (neighbors [[-1 0] [1 0] [0 -1] [0 1]] ; 이웃하는 좌표를 정의
                        size
                        yx))
  ([deltas size yx]
    (filter (fn [new-yx] ; 적절하지 않은 좌표 제거
              (every? #(< -1 % size) new-yx))
            (map #(vec (map + yx %)) ; 후보 좌표 계산
                 deltas))))

(neighbors 3 [0 0])
;=> ([1 0] [0 1])

(neighbors 3 [1 1])
;=> ([0 1] [2 1] [1 0] [1 2])

(map #(get-in matrix %) (neighbors 3 [0 0]))
;=> (4 2)
