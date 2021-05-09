; 반복문 2
; - doseq

; (doseq [elem list] 표현식)

(doseq [elem '(1 2 3)]
  (println elem))
; 1
; 2
; 3
; nil


; (for [elem list] 표현식), 게으르게 동작

(for [elem '(1 2 3)]
  (println elem))
; 1
; 2
; 3
; (nil nil nil)
