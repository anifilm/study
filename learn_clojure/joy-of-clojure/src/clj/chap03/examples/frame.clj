(ns examples.frame)

;;
;; 3.4.2 그래픽 다뤄보기
;;

(def frame (java.awt.Frame.))
;=> #'user/frame

(for [meth (.getMethods java.awt.Frame) ; 클래스 메서드를 순회
      :let [name (.getName meth)]       ; var 이름을 바인딩
      :when (re-find #"Vis" name)]      ; 찾은 이름들을 시퀀스로 구성
  name)
;=> ("setVisible" "isVisible")

(.isVisible frame)
;=> false

(.setVisible frame true)
;=> nil

(.setSize frame (java.awt.Dimension. 200 200))
;=> nil

(def gfx (.getGraphics frame))
;=> #'user/gfx

(.fillRect gfx 100 100 50 75)

(.setColor gfx (java.awt.Color. 255 128 0))
(.fillRect gfx 100 150 75 50)


;;
;; 3.4.3 종합하기
;;

(doseq [[x y xor] (xors 200 200)]
  (.setColor gfx (java.awt.Color. xor xor xor))
  (.fillRect gfx x y 1 1))


;;
;; 3.4.4 뭔가 잘못되었을 때
;;

(doseq [[x y xor] (xors 500 500)]
  (.setColor gfx (java.awt.Color. xor xor xor))
  (.fillRect gfx x y 1 1))

(defn xors [xs ys]
  (for [x (range xs) y (range ys)]
    [x y (rem (bit-xor x y) 256)]))

(defn clear [g] (.clearRect g 0 0 200 200))


;;
;; 3.4.5 재미삼아 해보기
;;

(defn f-values [f xs ys]
  (for [x (range xs) y (range ys)]
    [x y (rem (f x y) 256)]))

(defn draw-values [f xs ys]
  (clear gfx)
  (.setSize frame (java.awt.Dimension. xs ys))
  (doseq [[x y v] (f-values f xs ys)]
    (.setColor gfx (java.awt.Color. v v v))
    (.fillRect gfx x y 1 1)))

(draw-values bit-and 256 256)
(draw-values + 256 256)
(draw-values * 256 256)
