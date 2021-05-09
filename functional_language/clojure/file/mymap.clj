; 단어 세기
; - 해시 맵과 변경 불가 속성

; 빈 해시 맵 만들기
(def mymap {})

; 초기값으로 생성 (:key1은 키워드(keyword) -> 그 이름이 곧 값인 변수)
(def mymap {:key1 "val1" :key2 2})

; 해시 맵에서 키에 대한 값을 얻으려면 get 함수를 사용
(get mymap :key1)
; "val1"


; 정의한 키와 값의 내용을 변경 (assoc 함수 사용)
(assoc mymap :key1 "new_key1")
; {:key1 "new_key1", :key2 2}

; 정의한 키와 값의 내용을 변경, 두 번째 (update 함수 사용)
(update mymap :key2 inc)
; {:key1 "val1", :key2 3}

; 결과는 값이 변경 되지 않았다. 왜냐하면 해시 맵은 immutable 이니까.


; 해시 맵의 값을 변경하기 위해선 값의 수정이 아닌 변수에 재할당을 필요로 한다.
(def mymap (assoc mymap :key "new_key1"))
