from linkedListBasic import LinkedListBasic

list = LinkedListBasic()
list.append(30)
list.insert(0, 20)

list.printList()  # 20 30

a = LinkedListBasic()
a.append(4)
a.append(3)
a.append(3)
a.append(2)
a.append(1)

list.extend(a)
list.printList()  # 20 30 4 3 3 2 1

list.reverse()
list.printList()  # 1 2 3 3 4 30 20

list.pop()
list.printList()  # 2 3 3 4 30 20

print("count(3):", list.count(3))  # 2
print("get(2):", list.get(2))  # 3

list.printList()  # 2 3 3 4 30 20
