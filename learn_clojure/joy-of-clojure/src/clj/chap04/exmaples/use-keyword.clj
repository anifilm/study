(ns exmaples.use-keyword)

;;
;; 4.3.1 키워드 활용 방법
;;

;; 키로 활용

(def population {:zombies 2700, :humans 9})

(get population :zombies)
;=> 2700

(println (/ (get population :zombies)
            (get population :humans))
          "zombies per capita")
; 300 zombies per capita


;; 함수로 활용

(:zombies population)
;=> 2700

(println (/ (:zombies population)
            (:humans population))
          "zombies per capita")
; 300 zombies per capita
