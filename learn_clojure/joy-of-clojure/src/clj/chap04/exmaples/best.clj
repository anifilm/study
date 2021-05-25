(ns exmaples.best)

;;
;; 4.4.2 Lisp-1
;;

(defn best [f xs]
  (reduce #(if (f % %2) % %2) xs))

(best > [1 3 4 2 7 5 3])
;=> 7
