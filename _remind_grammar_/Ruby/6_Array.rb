# 배열

# Arrays
my_array = [1, 2, 3, 4, 5]

my_array[2]  # 3
my_array[-1] # 5

# 배열 쉽게 만들기
my_array = %W[Alice Quees Gryphon] # ["Alice", "Quees", "Gryphon"]
(1..42).to_a # [1, 2, 3, ..., 42]

# 다차원 배열 만들기
multi_dimension_array = [[1, 2, 3], [4, 5, 6], [7, 8, 9]]
multi_dimension_array[1][1] # 5

# 배열의 합집합, 교집합, 차집합
x = [1, 3, 5, 7, 9]
y = [3, 7, 11, 13]

x | y  # [1, 3, 5, 7, 9, 11, 13]
x & y  # [3, 7]
x - y  # [1, 5, 9]


# 배열에서 사용할 수 있는 메서드
my_array = [1, 3, 5, 7, 9]

# .size 배열의 크기를 반환
my_array.size # 5

# .reverse 배열의 순서 뒤집기 (비파괴 메서드, 원본 수정 X)
# .reverse! 를 사용할 경우 my_array의 값을 바로 변경함 (원본 수정 O)
my_array.reverse # [9, 7, 5, 3, 1]

# .sort 배열 정렬
my_array = [7, 42, 5, 3, 2]
my_array.sort  # [2, 3, 5, 7, 42]


# 범위 사용하기 (Range 객체 형식)
(1..10)  # 1 ~ 10까지의 숫자를 가지는 Range 객체 생성
(1...10) # 1 ~ 9 까지의 숫자를 가지는 Range 객체 생성

# Range 객체의 시작과 끝의 값을 알아내기 위한 begin, end 메서드
(1..10).begin # 1
(1..10).end   # 10

# Range 객체가 특정 값을 가지고 있는지 알아내기 위한 include? 메서드
(1..10).include?(11) # false
