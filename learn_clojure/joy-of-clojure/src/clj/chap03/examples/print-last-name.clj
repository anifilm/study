(ns examples.print-last-name)

;;
;; 3.3.4 함수 인자에서의 구조분해
;;
(defn print-last-name [{:keys [l-name]}]
  (println l-name))

(print-last-name guys-name-map)
; Steele
;=> nil
