(ns examples.fn)

;;
;; 2.5.1 익명 함수
;;

(fn [x y] ; 함수의 인자 벡터
  (println "Making a set") ; 함수의 몸체
  #{x y}) ; 마지막 줄은 반환 값을 표현
;=> #<Fn@4f7f1f95 user/eval6433[fn]>

((fn [x y] ; 함수를 정의하고 바로 호출
  (println "Making a set")
  #{x y})
  1 2) ; 함수에 1과 2를 인자로 전달
; Making a set ; 반환된 Set을 출력
;=> #{1 2}
