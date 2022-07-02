a = [3]

def calc(a):
    a = [4]
    return a


print(a)  # [3]
print(calc(a))  # [4]
print(a)  # [3]
