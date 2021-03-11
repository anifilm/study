# 연산자

# 산술 연산자

# 더하기 +
puts 1 + 2 # 3

# 빼기 -
puts 2 - 1 # 1

# 곱하기 *
puts 2 * 3 # 6

# 나누기 /
puts 6 / 2 # 3

# 나머지 %
puts 5 / 2 # 1

# 제곱 **
puts 2 ** 3 # 8

# 나눗셈 정수 연산
puts 1 / 2   # 0 (0.5가 아님, 정수 나누기 정수이기 때문)
puts 1 / 2.0 # 0.5 (실수 결과를 얻기 위해서는 실수로 나눠줘야 한다.)


# 복합 대입 연산자 (+=, -=, *=, /=)
i = 10
i += 10 # 20

# 증감 연산자(++, --)는 지원 안함 (파이썬과 동일)
i = 0
i += 1  # 1
i -= 1  # 0


# 관계 연산자 (Relational Operator)

1 == 1 # true
1 != 1 # false

2 > 1  # true
2 >= 2 # true


# 논리 연산자 (Boolean Operator)

# && (AND)
speak = true
walk = true
speak && walk # true

walk = false
speak && walk # false

# || (OR)
speak = false
walk = true
speak || walk # true

walk = false
speak || walk # false

# ! (NOT)
!true # false
