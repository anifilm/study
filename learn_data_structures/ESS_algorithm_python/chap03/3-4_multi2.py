n = 10

for i in range(1, n):  # 세로 길이를 1부터 n까지 반복
    for j in range(1, n):  # 가로 길이를 1부터 n까지 반복
        for k in range(1, n):  # 높이를 1부터 n까지 반복
            print(str(i) + ' x ' + str(j) + ' x ' + str(k) + ' = ' + str(i * j * k))  # 부피를 출력
