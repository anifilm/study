; if 표현식

(defvar x 123)
(if (> x 3)
  "Yes!"
  "No!")
; "Yes!"

(defun compare3 (x)
  (if (> x 3)
    "bigger"
    "smaller"))

(compare3 5)
; bigger
(compare3 2)
; smaller
