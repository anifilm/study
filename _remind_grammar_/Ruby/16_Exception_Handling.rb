# 예외 제어

# 예외 발생: raise의 인수로 지정한 문자열을 메시지로 하여 RuntimeError를 발생시킴
# 첫 인자로 예외 클래스를 지정할 경우, 두번째 인자로 메시지를 지정

# 예외 처리는 begin ... rescue ... end 구문을 사용한다.

# 예외 발생시키기
raise "error!"
raise StandardError, "error!"

# 예외 처리
begin
    # 예외가 발생할 가능성이 있는 구문
    file = File.open('text.txt')
rescue => e
    # 발생한 예외를 보완 처리
    # 예외 객체를 변수 e에 대입
    puts "Error #{e.class}!"
else
    # 예외가 발생하지 않은 경우 실행되는 처리
ensure
    # 예외 유무에 상관없이 실행시킬 구문
    file.close if file
end


# 예외 객체의 메서드

# 예외 정보를 취득하기 위한 예외 객체의 메서드
e.class     # StandardError
e.message   # "error message"
e.backtrace # 콜스택 배열


# 대역 탈출

# 다중 내포 관계에 있는 처리에서 한번에 탈출하는 용도로 사용
# catch/throw: catch로 지정한 블록 내부에서 throw를 호출하면 catch 위치로
# 돌아갈 수 있다.

catch: triple_loop do
    loop do
        puts 'one'

        loop do
            puts 'two'

            loop do
                puts 'three'

                throw :triple_loop
            end
        end
    end
end
