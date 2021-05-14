; Averaging numbers in Java
;public static double average(double[] numbers) {
;    double sum = 0;
;    for (int i = 0; i < numbers.length; i++) {
;        sum += numbers[i];
;    }
;    return sum / numbers.length;
;}

; Here is the Clojure equivalent:

(defn average
  [numbers]
  (/ (apply + numbers) (count numbers)))

(average [60 80 100 400])
; 160
