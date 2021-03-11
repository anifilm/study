# 심볼 (Symbols)

# symbol 표기법
:my_symbol

# Hash에서의 symbol 사용
numbers_hash = {
    :one => 1,
    :two => 2,
    :three => 3,
}
puts numbers_hash[:one]

# 새로운 Hash 문법 (키는 symbol 이다.)
numbers_hash = {
    one: 1,
    two: 2,
    three: 3,
}
puts numbers_hash[:one]


# 심볼의 형변환

# symbol을 string으로 변환하기
:hympty.to_s # "humpty"

# string을 symbol로 변환하기
"humpty".to_sym # :humpty
"humpty".intern # :humpty
