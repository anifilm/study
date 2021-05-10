(ns examples.introduction)

(defn blank? [str]
  (every? #(Character/isWhitespace %) str))

(defn hello-world [username]
  (println (format "Hello, %s" username)))

; (load-file "src/examples/introduction.clj") 파일 직접 불러오기

; (require 'examples.introduction) 네임스페이스를 통한 파일 불러오기
; (examples.introduction/hello "사용자이름") 형식으로 사용

; (require 'examples.introduction) require로 호출 후
; (refer 'examples.introduction) 네임스페이스 없이 사용 하도록 설정

; require -> refer로 파일을 불러온 것과 동일하게
; (use 'examples.introduction) 네임스페이스 없이 사용 하도록 파일 불러오기
; (hello "사용자이름") 형식으로 사용 (네임스페이스 없이 사용 가능)

; (defn hello
;   "Writes hello message to *out*. Calls you by username.
;   Knows if you have been here before."
;   [username]
;   (dosync
;     (let [past-visitor (@visitors username)]
;       (if past-visitor
;         (str "Welcome back, " username)
;         (do
;           (alter visitors conj username)
;           (str "Hello, " username))))))

(def fibs (lazy-cat [0 1] (map + fibs (rest fibs))))

(defn hello
  "writes hello message to *out*. Calls you by username"
  [username]
  (println (str "Hello, " username)))
