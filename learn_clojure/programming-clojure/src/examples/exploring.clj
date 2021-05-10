(ns examples.exploring
  (:require [clojure.string :as str])
  (:import (java.io File)))

; (use 'examples.exploring) 네임스페이스 없이 사용 하도록 파일 불러오기
; (use :reload 'examples.exploring) 라이브러리 다시 불러오기
(defn greeting
  "Returns a greeting of the form 'Hello, username.'"
  [username]
  (str "Hello, " username))
