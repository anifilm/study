; if 표현식
; - cond

; if 표현식의 중첩
(if (> x 0)
  (if (> x 10)
    "over10"
    "between 0 and 10")
  "minus")

; if 문이 중첩되면 가독성이 떨어지므로 cond 키워드를 사용하는 것이 좋다. (switch 문과 유사)
(defvar x 12)
(cond
  ((< x 0) "minus")
  ((> x 10) "over 10")
  (t "else"))
