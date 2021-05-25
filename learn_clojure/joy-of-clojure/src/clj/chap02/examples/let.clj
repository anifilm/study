(ns examples.let)

;;
;; 2.6.2 로컬
;;

(let [r  5
      pi 3.1415
      r-squared (* r r)]
  (println "radius is" r)
  (* pi r-squared))
; radius is 5
;=> 78.53750000000001
