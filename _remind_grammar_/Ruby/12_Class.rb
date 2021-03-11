# 클래스 (Class)

# 루비의 모든 것은 객체(Object)이다.
# 객체는 attribute와 method를 가지고 있다.

# Class 작성하기
class Person
    def initialize(name, age)
        @name = name
        @age = age
    end

    def describe
        puts "I'm #{@name} and #{@age} years old."
    end
end

# 객체 생성하기
alice = Person.new("Alice", 10)
ada = Person.new("Ada", 9)

# 객체 사용하기
alice.describe
ada.describe


# Class 문법

# initialize는 class를 통한 객체 생성시 객체를 초기화하는 생성자이다.
# 변수에 @를 사용하여 해당 변수가 인스턴스 변수임을 나타낸다. 이는 변수가 클래스의 인스턴스에 속함을 의미한다.
# .new 키워드를 사용해 class의 객체를 생성한다.

class Person
    CONSTANT_VALUE = 42

    def initialize(name)
        @name = name
    end

    def name() # getter
        @name
    end

    def name=(value) # setter
        @name = value
    end
end

# 상수 참조
Person::CONSTANT_VALUE # 42

alice = Person.new("Alice")
puts alice.name

alice.name = "Alice in Wonderland"
puts alice.name


# 인스턴스 변수

# @ Instance variables: 각각의 인스턴스에서만 참조할 수 있는 변수로,
# 객체의 상태를 저장할 수 있다. 객체 밖에서 인스턴스 변수에 접근하기
# 위한 메소드로 attr_accessor를 이용

class Car
  # 인스턴스 변수에 접근하기 위한 메서드. 자동으로 length= 인스턴스 변수가 정의됨.
  attr_accessor :name
end

my_car = Car.new
my_car.name # nil
my_car.name = "batcar"
my_car.name # batcar


# 래퍼 메서드

# attr_reader: 인스턴스 변수에 접근하기 위해 사용
# attr_writer: 인스턴스 변수를 수정하기 위해 사용
# attr_accessor: 인스턴스 변수에 접근하고 수정하기 위해 사용

class Person
  attr_reader :name
  attr_writer :name
  attr_accessor :age

  def initialize(name, age)
    @name = name
    @age = age
  end
end


# 클래스 메서드

# 클래스 메서드: 클래스를 대상으로 호출할 수 있는 메소드
# 인스턴스를 생성하는 .new 도 클래스 메소드 중 하나

# 클래스 메서드를 정의하기 위해서는 메서드명 앞에 self를 붙여서 정의한다.
# self는 해당 메서드가 속한 클래스를 가리키게 된다.

# 인스턴스 두 개를 생성하고 이들을 배열로 반환하는 클래스 메서드
class Person
  attr_accessor :name

  def self.all
    # code
  end
end

Person.all


# 스코프

# @@ Class variables: 클래스 변수, 클래스와 해당 인스턴스를 스코프로 하는 변수
# $ global variables: 전역변수, 어디에서든 사용 가능한 변수
# local variables: 지역변수, 특정 메서드에서만 사용가능한 변수

# 클래스의 인스턴스 갯수를 카운트하는 예제
class Person
  @@count = 0

  def initialize(name)
    @name = name
    @@count += 1
  end

  def self.counter
    return @@count
  end
end

alice = Person.new("Alice")
mabel = Person.new("Mabel")

puts "Number of Person: #{Person.counter}" # Number of Person: 2


# 싱글톤 메서드

# 클래스에 정의한 메소드 외에, 해당 인스턴스 고유의 메소드를 가질수 있다.

class Foo
end

foo = Foo.new
bar = Foo.new

# bar에만 싱글톤 메서드를 정의하기
def bar.my_singleton
  puts "SIngleton Method"
end

bar.my_singleton # SIngleton Method
foo.my_singleton # NoMethodError
