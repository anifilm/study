def is_leaf_year(year):
    if year % 4 == 0:
        if year % 100 == 0 and year % 400 != 0:
            return False
        else:
            return True
    else:
        return False


for i in range(1950, 2051):
    print(str(i) + ' ' + str(is_leaf_year(i)))
