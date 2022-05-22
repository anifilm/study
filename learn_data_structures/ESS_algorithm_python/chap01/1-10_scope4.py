x = 10

def reset():
    x = 30  # 전역 변수와 같은 이름이지만 지역 변수로 처리됨
    print(x)


reset()
print(x)
