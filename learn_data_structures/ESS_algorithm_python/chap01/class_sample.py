# 클래스를 정의하여 인스턴스 생성

class User:  # User 클래스 정의
    def __init__(self, name, password):  # 생성자 정의
        self.name = name
        self.password = password

    def login(self, password):  # 로그인 메서드 정의
        if self.password == password:
            return True
        else:
            return False

    def logout(self):  # 로그아웃 메서드 정의
        print('logout')


a = User('admin', 'password')  # 사용자 이름 admin, 암호 password인 사용자 만들기

if a.login('password'):  # 암호 password를 사용해 로그인 한 상태
    a.logout()


# 클래스의 상속

class GuestUser(User):  # User 클래스를 상속하여 GuestUser 클래스를 정의
    def __init__(self):
        super().__init__('guest', 'guest')


b = GuestUser()

if b.login('guest'):
    b.logout()
