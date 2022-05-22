for i in range(1, 51):
    if i % 3 == 0:  # 3으로 나누어떨어질 때
        print('Fizz', end=' ')
    elif i % 5 == 0:  # 5로 나누어떨어질 때
        print('Buzz', end=' ')
    else:  # 3으로도 5로도 나누어떨어지지 않을 때
        print(i, end=' ')
