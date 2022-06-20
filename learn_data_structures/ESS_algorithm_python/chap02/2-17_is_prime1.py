import math  # 제곱근을 구할 때 사용할 수학 모듈을 불러옴


def is_prime(n):
    if n <= 1:
        return False
    for i in range(2, int(math.sqrt(n)) + 1):  # 제곱근을 계산
        if n % i == 0:  # 나누어떨어지는지를 판정
            return False  # 나누어떨어지면 소수가 아님
    return True
