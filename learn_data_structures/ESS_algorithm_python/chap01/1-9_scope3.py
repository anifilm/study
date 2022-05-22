x = 10

def update():
    x += 30  # 갱신하려는 변수 x는 지역 변수
    print(x)


update()
print(x)
