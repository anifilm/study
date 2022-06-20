import math


def is_prime(n):
    if n <= 1:
        return False
    for i in range(2, int(math.sqrt(n)) + 1):
        if n % i == 0:
            return False
    return True


for i in range(200):
    if is_prime(i):  # 앞에서 정의한 함수를 호출
        print(i, end=' ')
