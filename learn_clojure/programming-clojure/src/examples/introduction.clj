(ns examples.introduction)

(defn blank? [str]
  (every? #(Character/isWhitespace %) str))

(defn hello-world [username]
  (println (format "Hello, %s" username)))

; (load-file "introduction.clj")
(defn hello
  "Writes hello message to *out*. Calls you by username.
  Knows if you have been here before."
  [username]
  (dosync
    (let [past-visitor (@visitors username)]
      (if past-visitor
        (str "Welcome back, " username)
        (do
          (alter visitors conj username)
          (str "Hello, " username))))))

(def fibs (lazy-cat [0 1] (map + fibs (rest fibs))))
