for i in range(1, 51):
    if i % 3 == 0:  # 3으로 나누어떨어질 때
        print('Fizz', end=' ')
    else:  # 3으로 나누어떨어지지 않을 때
        print(i, end=' ')
