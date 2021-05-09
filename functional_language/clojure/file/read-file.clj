; 파일 읽기

(def content (slurp "./textfile.txt"))
(type content)

(require '[clojure.string :as str]) ; 라이브러리 import

(def line-list (str/split content #"\r\n")) ; 읽어들인 문자열을 개행 단위로 리스트화

(println line-list)

; 개행 표기
; windows    #"\r\n"
; unix 계열   #"\n"
