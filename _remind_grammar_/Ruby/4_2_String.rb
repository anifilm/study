# String 관련 메서드  https://ruby-doc.org/core-2.5.1/String.html
str = "Hello"

# 문자열 곱하기
result = str * 3
puts result # "HelloHelloHello"

# 문자열 붙이기
str << ", world!"
puts str # "Hello, world!"

# 문자열 붙이기
str.concat(" I love Ruby!")
puts str # "Hello World! I love Ruby!"

# 문자열 비교 1 (같으면 0, 포함하는 경우 1, 다르면 -1을 반환)
puts str <=> "Hello"      # 1
puts str.casecmp("Hello") # 1

# 문자열 비교 2
puts str == "hello" # false

# puts str["hello"] # false (TODO 확인 필요)


# ----------------------------------------------------------------------------
str = "Hello"

# 문자열 인덱싱
puts str[0] # "H"

# 문자열 슬라이싱
puts str[0, 2] # "He"
puts str[0..2] # "Hel"

# 문자열 첫글자를 반환
puts str.chr

# 문자열 요소의 개수를 반환
puts str.count "l" # 2

# 문자열에서 'H'와 'o'를 삭제한 값을 반환 (!)
puts str.delete "Ho" # "ell"

# 문자열에서 문자를 찾아 인덱스 반환
puts str.index("e") # 1

# 문자열의 값을 변경
puts str.replace("world")

# 문자를 해당 인덱스에 추가
puts str.insert(0, "Hello, ")
puts str.insert(-1, "!")

# 문자열에서 인덱스+1에 해당하는 요소 값을 반환
puts str.inspect[1] # "H"

# 문자열의 길이를 반환
puts str.length # 13

# 문자열의 왼쪽에 문자열의 길이 20까지 "123"을 연속으로 채움
puts str.ljust(20, "123") # "Hello, world!1231231"

# 문자열의 오른쪽에 문자열의 길이 20까지 "123"을 연속으로 채움
puts str.rjust(20, "123") # "1231231Hello, world!"

# 문자열의 공백 제거
str = "  hello  "
puts str.strip  # "hello"
puts str.lstrip # "hello  "
puts str.rstrip # "  hello"

# 문자열을 전달된 파라미터를 기준으로 나누어줌
str = "hello"
result = str.partition("l") # ["he", "l", "lo"]
print result; puts

# 문자열을 전달된 파라미터를 기준으로 나누어줌 (해당 값은 제거됨)
str = "hello"
result = str.split("l") # ["he", "", "o"]
print result; puts

# 문자열 앞에 파라미터로 전달되는 값을 붙임
puts str.prepend("world ") # "world hello"

# 문자열 인덱스에 해당하는 값을 반환
str = "hello"
puts str.slice(2) # "l", 인덱스의 요소를 반환
puts str.slice(1, 2) # "el", 첫 번째 요소부터 두 개의 값을 반환
puts str.slice(1..2) # "el", 첫 번째 요소부터 두 번째 요소까지의 값을 반환

# 문자열 치환
puts str.sub("o", "u~")  # "hellu~"
puts str.sub("lo", "u~") # "helu~"

# 문자열에서 대문자는 소문자로, 소문자는 대문자로 변경
str = "Hello"
puts str.swapcase # "hELLO"
