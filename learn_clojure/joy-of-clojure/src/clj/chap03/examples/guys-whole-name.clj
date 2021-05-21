(ns examples.guys-name-map)

;;
;; 3.3.2 벡터로 구조분해하기
;;
(def guys-whole-name ["Guy" "Lewis" "Steele"])

(let [[f-name m-name l-name] guys-whole-name]
  (str l-name ", " f-name " " m-name))
;=> "Steele, Guy Lewis"
