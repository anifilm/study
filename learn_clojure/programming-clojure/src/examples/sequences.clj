(ns examples.sequences
  (:use examples.utils clojure.set clojure.xml))

; 이렇게 하지 말 것!
(let [m (re-matcher #"\w+" "the quick brown fox")]
  (loop [match (re-find m)]
    (when match
      (println match)
      (recur (re-find m)))))

(defn minutes-to-millis [mins] (* mins 1000 60))
(defn recently-modified? [file]
  (> (.lastModified file)
    (- (System/currentTimeMillis) (minutes-to-millis 30))))
