; Locla Bindings: let

;public static double hypot(double x, double y) {
;    final double x2 = x * x;
;    final double y2 = y * y;
;    return Math.sqrt(x2 + y2);
;}

; is equivalent to this Clojure function;

(defn hypot
  [x y]
  (let [x2 (* x x)
        y2 (* y y)]
    (Math/sqrt (+ x2 y2))))
