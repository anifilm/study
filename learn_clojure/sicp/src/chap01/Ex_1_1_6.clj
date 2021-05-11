; 1.1.6 조건 식과 술어

(defn abs [x]
  (cond
    (> x 0) x
    (= x 0) 0
    (< x 0) (- x)))

(defn abs [x]
  (cond
    (< x 0) (- x)
    :else x))

; if 는 따져 볼 경우가 둘밖에 없을 때 사용하기 좋다.
(defn abs [x]
  (if (< x 0)
    (- x)
    x))


(def x 6)
(and (> x 5) (< x 10))
; true


; 어떤 수가 다른 수 보다 크거나 같은지 따지는 술어를 프로시저로 만들면 다음과 같다.
(defn >= [x y]
  (or (> x y) (= x y)))

(defn >= [x y]
  (not (< x y)))
