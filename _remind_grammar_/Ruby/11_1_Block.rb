# Blocks

# 블록은 클로저 혹은 익명함수와 비슷하다. 즉 이름 없는 메서드를 생성하는 방법
# 이라고 할 수 있다.
# do...end 혹은 {} 으로 정의한다.

# 리시버.메서드명(args) do |param| action end
# object.method { |placeholder| action }

# File#open 메서드 예시
File.open("readme.md") do |file|
    puts file.read
end

# Array#each 메서드 사용 예시 - 블록을 매개변수로 받음
my_array = [1, 2, 3, 4, 5]
my_array.each do |n|
    n *= n
    print n, " "
end
puts
