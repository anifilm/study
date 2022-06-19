n = 18
result = ''

while n > 0:
    result = str(n % 2) + result  # 나머지를 문자열의 왼쪽에 추가해 나감
    n //= 2  # 2로 나눈 몫을 다시 대입

print(result)
