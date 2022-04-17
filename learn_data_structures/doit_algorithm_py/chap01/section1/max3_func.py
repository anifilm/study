# 세 정수의 최대값 구하기

def max3(a, b, c):
    """a, b, c의 최대값을 구하여 반환"""
    max = a
    if b > max: max = b
    if c > max: max = c
    return max  # 최대값 반환


print(f'max3(3, 2, 1) = {max3(3, 2, 1)}')  # [A] a > b > c
print(f'max3(3, 2, 2) = {max3(3, 2, 2)}')  # [B] a > b = c
print(f'max3(3, 1, 2) = {max3(3, 1, 2)}')  # [C] a > c > b
print(f'max3(3, 2, 3) = {max3(3, 2, 3)}')  # [D] a = c > b
print(f'max3(2, 1, 3) = {max3(2, 1, 3)}')  # [E] c > a > b
print(f'max3(3, 3, 2) = {max3(3, 3, 2)}')  # [F] a = b > c
print(f'max3(3, 3, 3) = {max3(3, 3, 3)}')  # [G] a = b = c
print(f'max3(2, 2, 3) = {max3(2, 2, 3)}')  # [H] c > a = b
print(f'max3(2, 3, 1) = {max3(2, 3, 1)}')  # [I] b > a > c
print(f'max3(2, 3, 2) = {max3(2, 3, 2)}')  # [J] b > a = c
print(f'max3(1, 3, 2) = {max3(1, 3, 2)}')  # [K] b > c > a
print(f'max3(2, 3, 3) = {max3(2, 3, 3)}')  # [L] b = c > a
print(f'max3(1, 2, 3) = {max3(1, 2, 3)}')  # [M] c > b > a
