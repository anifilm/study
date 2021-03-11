# 반복문

# while
i = 3
while i > 0 do
    print i # 321 출력
    i -= 1
end
puts

# until (조건식이 false인 동안 반복)
j = 3
until j == 0 do
    print j # 321 출력
    j -= 1
end
puts

i = 0
until i == 6
    i += 1
end
puts i # 6 출력


# for...in 문은 range 객체의 값을 하나씩 꺼내어 반복

# for variable in range
#     puts variable
# end

# 1부터 10까지 출력
for i in 1..10
    print i, " "
end
puts


# 루비의 반복문에서 구문 종료(break)와 건너뛰기(next)

# 짝수 출력하지 않기
for i in 1..10
    next if i % 2 == 0
    print i, " "
end
puts

# 해당 값과 같으면 반복 종료
for i in 1..10
    break if i > 5
    print i, " "
end
puts

# ----------------------------------------------------------------------------
# 루비에서는 for문 보다 다양한 interator 메서드를 사용해 손쉽게 반복을 구현할 수 있다.

# loop (break 문을 이용한 종료 조건 명시 필요, do ~ while과 유사)

# loop문을 이용해서 1부터 10까지 출력하기
i = 1
loop do
    print i, " "
    i += 1
    break if i > 10
end
puts

# .upto and .downto 메서드
95.upto(100) { |num| print num, " " } # 95 96 97 98 99 100
puts

"L".upto("P") { |w| print w, " " } # L M N O P
puts

# .times 메서드
5.times { print "Do cats eat bats? " }
puts

# .each 메서드
odds = [1, 3, 5, 7, 9]
odds.each do |item|
    item *= 2
    print item, " "
end
puts

# 해시의 경우 |key, value|의 형식으로 키-값 쌍을 순환 할 수 있다.
names = { dinah: "cat", march_hare: "rabbit", dormouse: "rat" }
names.each { |name, species| puts "#{name} is #{species}" }
# dinah is cat
# march_hare is rabbit
# dormouse is rat
