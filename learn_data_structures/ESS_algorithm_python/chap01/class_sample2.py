# __로 시작하는 변수는 접근 불가

class User:
    def __init__(self, name, password):
        self.name = name
        self.__password = password


c = User('admin', 'password')

c.name  # __로 시작하지 않는 것은 접근할 수 있음
c.__password  # __로 시작하는 것은 접근할 수 없음
