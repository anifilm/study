(ns examples.in-place)

;;
;; 2.5.4 #()으로 익명 함수(in-place) 만들기
;;

(def make-list0 #(list)) ; 인자를 취하지 않음

(make-list0)
;=> ()

(def make-list2 #(list %1 %2)) ; 두 개의 인자를 받음

(make-list2 1 2)
;=> (1 2)

(def make-list2+ #(list %1 %2 %&)) ; 두 개 이상의 인자를 받음

(make-list2+ 1 2 3 4 5)
;=> (1 2 (3 4 5))
