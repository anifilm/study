# 뮤터블 시퀀스 요소를 역순으로 정렬(n을 사용하지 않음)

from typing import Any, MutableSequence

def reverse_array(a: MutableSequence) -> None:
    """ 뮤터블 시퀀스 a의 요소를 역순으로 정렬 """
    for i in range(len(a) // 2):
        a[i], a[len(a) - i - 1] = a[len(a) - i - 1], a[i]


if __name__ == '__main__':
    print('배열 요소를 역순으로 정렬합니다.')
    nx = int(input('요소 수를 입력하세요.: '))
    x = [None] * nx  # 원소 수가 nx인 리스트를 생성

    for i in range(nx):
        x[i] = int(input(f'x[{i}]：'))

    reverse_array(x)  # x를 역순으로 정렬

    print('배열 요소를 역순으로 정렬했습니다.')
    for i in range(nx):
        print(f'x[{i}]＝{x[i]}')
