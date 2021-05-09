; if 표현식
; - progn

(defvar x 123)
(if (> x 3)
  (print "yes")
  (print "and this too!")
  (print "no"))
; - EVAL: too many parameters for special operator IF
; The following restarts are available
; ABORT   :R1   Abort main loop

(defvar x 123)
(if (> x 3)
  (progn
    (print "yes")
    (print "and this too!"))
  (print "no"))
