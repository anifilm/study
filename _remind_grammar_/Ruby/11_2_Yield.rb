# Yield

# 메서드 호출시 block의 표현식은 호출된 메서드의 yield로 전달된다.
# 즉, 메서드 내부에 yield가 있을 경우, 메서드 호출시 block을 공급해야 한다.

# yeild 사용법
def check_yield
    puts "before yield"
    yield
    puts "after yield"
end

check_yield { puts "block" }
# 출력
# "before yield"
# "block"
# "after yield"

# 매개변수가 있는 yield
def check_yield_with_param(item)
    puts "before yield"
    yield(item)
    puts "after yield"
end

check_yield_with_param("block") { |item| puts "#{item}" }
# 출력
# "before yield"
# "block"
# "after yield"


# 메소드에 블록이 부여되었는지 판단하기 위해 block_given? 메서드를 사용하는 예제

# block_given? 은 메소드가 블록을 인수로 호출한 경우 true를 반환
def block_given_sample
    puts "before yield"
    yield if block_given?
    puts "after yield"
end

# 블록이 없을 경우
block_given_sample
# "before yield"
# "after yield"

# 블록을 지정할 경우
block_given_sample do
    puts "block"
end
# "before yield"
# "block"
# "after yield"
