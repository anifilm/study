(ns examples.into-array)

;;
;; 5.1.1 "계속 그 단어를 사용하시는데 생각하는 그 의미가 아닌 것 같은데요."
;;

(def ds (into-array [:willie :barnabas :adam])) ; into-array는 자바 배열을 벡터로 만들어준다.
(seq ds)
;=> (:willie :barnabas :adam)

(aset ds 1 :quentin) ; aset은 배열의 특정 위치에 값을 입력한다.
;=> :quentin

(seq ds)
;=> (:willie :quentin :adam)


(def ds [:willie :barnabas :adam]) ; 이번에는 배열 대신 벡터를 생성한다.
ds
;=> [:willie :barnabas :adam]

(def ds1 (replace {:barnabas :quentin} ds))

ds
;=> [:willie :barnabas :adam] ; ds는 변경되지 않는다.
ds1
;=> [:willie :quentin :adam]  ; ds1은 원본 벡터의 수정된 버전이다.
