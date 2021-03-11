# 데이터 타입

# Numbers

# 정수
my_num = 100
large_num = 1_000_000
negative = -100

# 실수
price = 9.99


# String (문자열)
my_string = "I love Ruby"

# 문자열 조작
my_string[0] # I

# 문자열 길이 반환
my_string.length  # 11
"foobar".empty?   # false

# 문자열 뒤집기
my_string.reverse # "ybuR evol I"

# 문자열 대문자화, 소문자화, 캐피탈라이즈 (!)
my_string.upcase     # "I LOVE RUBY"
my_string.downcase   # "i love ruby"
my_string.capitalize # "I love ruby"


# 루비의 메서드 명명 규칙 (일부 비파괴 메서드를 대상. 원본 수정 X)
# 메서드 이름 끝에 !를 사용하면 변수 자체에 메서드의 결과를 바로 적용한다. (원본 수정 O)
first_name = "john"
first_name.capitalize!

puts first_name # "John"


# 문자열 삽입 - String Interpolation

# #{variable_name} 표기법을 사용해 문자열 중간에 값을 대입할 수 있다.
name = "Ruby"
puts "My name is #{name}!" # "My name is Ruby!"

# 작은 따옴표 (')로 문자열을 감쌀 경우에는 사용 불가
puts 'My name is #{name}'  # "My name is \#{name}!"

# 변수에 할당된 값이 string이 아니더라도 string으로 변환할 필요가 없다.
age = 26
puts "I am #{age} years old."


# 퍼센티지 기법

# %()를 이용해 문자열을 간단하게 생성하거나, 배열, 정규식 등을 간단하게 표현할 수 있다.
name = 'Alice'

# 식 전개와 백슬래시 기법 무효
%q(My name is #{name}) # "My name is \#{name}"

# 식 전개와 백슬래시 기법 유효
%(My name is #{name})  # "My name is Alice"
%Q(My name is #{name}) # "My name is Alice"

# 배열 간단하게 기술하기
%w(Alice Rabbit Cat) # ["Alice", "Rabbit", "Cat"]
%i(red green blue)   # [:red, :green, :blue]

# 정규 표현식
%r(/usr/bin) # /\/usr\/bin/


# 형 변환

ruby = "I love Ruby"
ruby + 3    # TypeError: no implicit conversion of Integer into string

# .to_i 정수로 변환 (Integer)
"3".to_i    # 3

# .to_f 부동소수로 변환 (Float)
"3.33".to_f # 3.33

# .to_s 문자열로 변환 (String)
100.to_s    # "100"


# Boolean (true / false)

speak = false


# Nil

# .nil? - 호출 된 객체가 nil이면 true를 반환하고 그렇지 않으면 false를 반환
age = 26
nil_var = nil

age.nil?     # false
nil_var.nil? # true
