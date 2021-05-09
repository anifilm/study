data A = One String Int | Two | Three

-- A 타입을 입력으로 받아들이는 함수
aFunc :: A -> String
aFunc (One str int) = str
aFunc Two = "two"
aFunc Three = "three"
