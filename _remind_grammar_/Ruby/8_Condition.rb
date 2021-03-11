# 조건문 (Condition)

# if
user_num = 0

if user_num < 0
    puts "You picked a negative integer!"
elsif user_num > 0
    puts "You picked a positive integer!"
else
    puts "You picked zero!" # 출력!
end


# expression if boolean (if 표현식)

# 예시
puts "Go next" if true

# same as
if true
    puts "Go next"
end


# unless (조건식이 false이면 실행)
busy = false

unless busy
    puts "I'm OK" # 출력!
else
    puts "Oh dear! Oh dear! I shall be too late!"
end


# Ternary (삼항 연산자)
dice1 = 5
dice2 = 6
puts dice1 > dice2 ? "dice1 won" : "dice2 won"

# same as
if dice1 > dice2
    puts "dice1 won"
else
    puts "dice2 won"
end


# case (switch문과 유사)
day = "Monday"

case day
when "Monday"
    puts "Work!"
when "Tuesday"
    puts "Work!"
when "Wednesday"
    puts "Work!"
when "Thursday"
    puts "Work!"
when "Friday"
    puts "Work!"
else
    puts "Rest"
end

# 축약
case day
when "Monday" then puts "Work!"
when "Tuesday" then puts "Work!"
when "Wednesday" then puts "Work!"
when "Thursday" then puts "Work!"
when "Friday" then puts "Work!"
else
    puts "Rest"
end
