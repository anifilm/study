(defn grow [name direction]
  (if (= direction :small)
    (str name " is growing smaller")
    (str name " is growing bigger")))

(defn toggle-grow [direction]
  (if (= direction :small) :big :small))

(toggle-grow :big)
; :small
(toggle-grow :small)
; :big

(defn oh-my [direction]
  (str "Oh My! You are growing " direction))

(oh-my (toggle-grow :small))

(defn suprise [direction]
  ((comp oh-my toggle-grow) direction))

(suprise :small)


; comp 사용 예제 -> 여러 함수를 직접 연결하는 형식으로 구성할 수 있다.
;(oh-my (toggle-grow :small))
;(comp oh-my toggle-grow) direction)
