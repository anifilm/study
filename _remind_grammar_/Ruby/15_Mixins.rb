# Mixins

# 모듈이 추가 동작 및 정보를 클래스에 혼합하는데 사용되면 이를 mixin 이라고 한다.
# Minins를 사용하면 코드를 다시 작성하지 않고도 클래스를 사용자 정의 할 수 있다.

# 모듈 include 하기 - minin
# class 내부에 module을 include 하면 상수나 메서드 앞에 모듈 이름을 붙일 필요없이
# 모듈의 메서드를 사용할 수 있다.
class Angle
    include Math
    cos(1) # Math::cos(1)
end


# extend

# extend 키워드는 클래스 레벨에서 모듈의 메서드를 혼합한다. 모듈에 정의한 메서드는
# 인스턴스의 싱글톤 메서드로 추가 할 수 있다.

module Greet
    def welcome(name)
        puts "Hello, #{name}!"
    end
end

o = Object.new # 최상위 클래스로 인스턴스 객체 o를 생성
o.extend Greet # 인스턴스 객체 o에 Greet 모듈의 메서드를 사용가능하도록 포함시킴

o.welcome("world") # "Hello, world!"
