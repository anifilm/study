# 세 정수를 입력받아 최대값 구하기

print("세 정수의 최대값을 구합니다.")
a = int(input("정수 a의 값을 입력하세요: "))
b = int(input("정수 b의 값을 입력하세요: "))
c = int(input("정수 c의 값을 입력하세요: "))

max = a
if b > max: max = b
if c > max: max = c

print(f'최대값은 {max}입니다.')
