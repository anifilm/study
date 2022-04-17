# 배열 원소의 최대값을 구해서 출력하기(원소값을 입력받음)

from max import max_of

print('배열의 최대값을 구합니다.')
print('주의: "end"를 입력하면 종료합니다.')

number = 0
x = []  # 빈 리스트

while True:
    s = input(f'x[{number}]값을 입력하세요: ')
    if s == 'end':
        break
    x.append(int(s))  # 배열의 맨 끝에 추가
    number += 1

print(f'{number}개를 입력했습니다.')
print(f'최대값은 {max_of(x)}입니다.')
