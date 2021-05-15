(defn grow [name direction]
  (if (= direction :small)
    (str name " is growing smaller")
    (str name " is growing bigger")))

(grow "Alice" :small)
; "Alice is growing smaller"
(grow "Alice" :big)
; "Alice is growing bigger"

(partial grow "Alice")

((partial grow "Alice") :small)

; 두 개의 매개 변수를 가지는 함수에 partial 함수를 사용하여 매개 변수를 나누어 입력 받을 수 있다.
