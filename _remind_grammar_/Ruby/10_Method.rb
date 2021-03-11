# 메서드

# 메서드는 def 키워를 이용하여 정의하며, class와 module에 정의하지 않으면
# 전역 top level에 정의된다.
# 루비의 메서드는 마지막 줄의 표현식을 자동으로 반환하므로 return 키워드를
# 생략 할 수 있다.

# 메서드 정의
def method_name(param)
    # code
end

# 메서드 호출
# method_name(args)

# 예시
def hello(param)
    puts "hello " + param
end

hello("world!")

# Method with return
def double(n)
    return n * 2
end

output = double(6)
puts output # 12


# 매개변수 (Parameter)

# 가변인자는 매개변수에 * 기호를 사용하여 여러개의 인자를 배열로 받을 수 있다.
# 단, 가변인자는 매개변수의 마지막에 위치해야 한다.

def calculator(operator, *nums)
    total = 0
    if (operator == "add")
        nums.each { |num| total += num }
    end
    total
end

puts calculator("add", 10, 2, 3, 5) # 20


# 매개변수의 기본값

# default parameter
def add(a, b=1)
    a + b
end

puts add(2) # 3
