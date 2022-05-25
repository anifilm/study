import sys  # 오류 발생 시 강제 종료하기 위한 모듈을 불러옴

input_price = input('insert: ')
if not input_price.isdecimal():
    print('정수를 입력하세요')
    sys.exit()  # 에러가 발생하면 강제 종료

product_price = input('product: ')
if not product_price.isdecimal():
    print('정수를 입력하세요')
    sys.exit()  # 에러가 발생하면 강제 종료

change = int(input_price) - int(product_price)

if change < 0:
    print('금액이 부족합니다')
    sys.exit()  # 에러가 발생하면 강제 종료

coin = [5000, 1000, 500, 100, 50, 10, 5, 1]

for i in coin:
    r = change // i
    change %= i
    print(str(i) + ': ' + str(r))
