a = [3]

def calc(a):
    a[0] += 4
    return a


print(a)  # [3]
print(calc(a))  # [7]
print(a)  # [7]
