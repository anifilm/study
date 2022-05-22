x = 10

def reset():
    global x  # 전역 변수로서 선언됨
    x = 30  # 전역 변수에 대입됨
    print(x)


reset()
print(x)
