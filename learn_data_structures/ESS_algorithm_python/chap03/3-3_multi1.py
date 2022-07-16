n = 10

for i in range(1, n):  # 첫 번째 숫자를 1부터 n까지 반복
    for j in range(1, n):  # 두 번재 숫자를 1부터 n까지 반복
        print(str(i) + ' x ' + str(j) + ' = ' + str(i * j))  # 곱셈의 답을 출력
