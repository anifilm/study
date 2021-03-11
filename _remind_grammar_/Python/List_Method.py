# 리스트의 메서드

# insert() 리스트의 특정 위치에 요소 삽입
lst = [1, 2, 3]
lst.insert(1, 10) # 두 번째 위치에 10 삽입
print(lst)  # [1, 10, 2, 3]

# append() 리스트 끝에 요소 삽입
lst = [1, 2, 3]
lst.append(4)
print(lst)  # [1, 2, 3, 4]

# clear() 리스트 내용 모두 삭제
lst = [1, 2, 3]
lst.clear()
print(lst)  # []

# del() 리스트의 특정 위치 요소 삭제
lst = [1, 2, 3]
del(lst[1]) # 두 번째 요소 삭제
print(lst)  # [1, 3]

# remove() 리스트의 특정 요소 삭제
lst = [1, 2, 3]
lst.remove(2) # 값 2 삭제
print(lst) # [1, 3]

# pop() 리스트의 마지막 요소 삭제후 해당 요소를 반환
lst = [1, 2, 3]
result = lst.pop() # result: 3
print(lst) # [1, 2]

# len() 리스트 요소의 개수를 반환
lst = [1, 2, 3]
result = len(lst)
print(result) # 3

# count() 리스트 내 특정 요소의 개수를 반환
lst = [1, 2, 3, 3, 2, 4]
result = lst.count(3) # 값 3은 몇개?
print(result) # 2

# copy() 리스트 복사 (deep copy)
org = [1, 2, 3]
dest = org.copy()
print(dest) # [1, 2, 3]

# extend() 리스트 병합 (+연산과 같은 결과)
a = [1, 2, 3]
b = [4, 5, 6]
a.extend(b)
print(a) # [1, 2, 3, 4, 5, 6]
print(b) # [4, 5, 6]

# split(' ') 문자열을 공백을 기준으로 잘라서 리스트로 반환
result = 'test split'.split(' ')
print(result)

# index() 리스트의 특정 요소 검색
lst = [1, 2, 3]
result = lst.index(3) # 값 3의 인덱스는?
print(result) # 2

# sort() 리스트 정렬
lst = [8, 1, 7, 2, 6, 3, 10, 4, 9, 5]
lst.sort() # 오름차순으로 정렬 후 값 저장
print(lst) # [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

lst = [8, 1, 7, 2, 6, 3, 10, 4, 9, 5]
lst.sort(reverse = True) # 내림차순으로 정렬 후 값 저장
print(lst) # [10, 9, 8, 7, 6, 5, 4, 3, 2, 1]

# sorted() 정렬된 리스트의 값을 반환 (비파괴 메서드)
lst = [8, 1, 7, 2, 6, 3, 10, 4, 9, 5]
result = sorted(lst)
print(result) # [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

# reverse() 리스트를 요소를 뒤집기 (정렬하지 않음)
lst = [8, 1, 7, 2, 6, 3, 10, 4, 9, 5]
lst.reverse()
print(lst) # [5, 9, 4, 10, 3, 6, 2, 7, 1, 8]
