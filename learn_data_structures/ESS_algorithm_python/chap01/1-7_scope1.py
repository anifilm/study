x = 10

def check():
    a = 30
    print(x)  # 전역 변수값을 출력
    print(a)  # 지역 변수값을 출력
    return


check()  # 함수 check를 호출
print(x)  # 전역 변수값을 출력
print(a)  # 지역 변수값을 출력 (에러 발생)
