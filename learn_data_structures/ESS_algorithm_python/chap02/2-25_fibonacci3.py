memo = {1: 1, 2: 1}  # 사전(딕셔너리)에 종료 조건 입력


def fibonacci(n):
    if n in memo:
        return memo[n]  # 사전에 등록되어 있으면 그 값을 반환

    memo[n] = fibonacci(n - 2) + fibonacci(n - 1)  # 사전에 등록되지 않았으면 계산하여 사전에 등록

    return memo[n]


print(fibonacci(8))
