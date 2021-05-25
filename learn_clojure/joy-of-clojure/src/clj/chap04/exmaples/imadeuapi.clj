(ns exmaples.imadeuapi)

;;
;; 4.1.1 절삭
;;

(let [imadeuapi 3.14159265358979323846264338327950288419716939937M]
  (println (class imadeuapi))
  imadeuapi)
; java.math.BigDecimal
;=> 3.14159265358979323846264338327950288419716939937M

(let [butieateadit 3.14159265358979323846264338327950288419716939937]
  (println (class butieateadit))
  butieateadit)
; java.lang.Double
;=> 3.141592653589793
