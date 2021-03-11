# 루비에서의 상속

# 상속 문법

# is-a 관계 : 예를들어, Cat is-a Animal의 관계가 성립할 때 상속을 사용
# 상속은 < 키워드를 사용하여 표현한다.

# 루비에서는 클래스 정의 시에 슈퍼클래스를 지정하지 않으면 자동으로 Object 클래스를
# 상속받는다.

# 루비에서 클래스는 단 하나의 부모클래스만 가질 수 있습니다.
Cat
# 부모 클래스
class Animal
    def eat
        puts "Eating!"
    end
end

# 자식 클래스
class Cat < Animal
end

cheshire_cat = Cat.new
cheshire_cat.eat

# 상속받은 클래스 확인하기
puts Animal.superclass # Object
puts Cat.superclass # Animal


# Override

# 자식클래스에서 부모클래스의 속성이나 메서들 대체

class Animal
    def initialize(name)
        @name = name
    end

    def walk
        return "Walking"
    end
end

# 메서드 Override
class Dog < Animal
    def walk
        return "Dog Walking!"
    end
end

# super 키워드를 사용하면, 자식 클래스(sub, derived)에서 부모클래스(super, base)
# 속성이나 메서드에 직접 액세스 할 수 있다.

# super 문법
class DerivedClass < Base
    def some_method
        super(optional args)
            # Some stuff
        end
    end
end


# Public & Private Method

# 클래스 메서드는 기본적으로 public 메서드이다. private 키워드를 사용해 private
# 메서드를 선언하며, private 메서드는 class 외부에서 접근할 수 없다.

class Dog
    def initialize(name, breed)
        @name = name
        @breed = breed
    end

    public
    def bark
        puts "bow!"
    end

    private
    def id
        @id_number = 42
    end
end
