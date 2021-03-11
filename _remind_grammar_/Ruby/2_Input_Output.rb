# 입력과 출력 (Inputs, Outputs)

# 출력 - 개행 없음
print "Hello Ruby\n"

# 출력 - 개행 있음 (println과 같다.)
puts "Ruby on rails"

# 입력
print("> ")
user_input = gets.chomp()
puts user_input

# 입력 - 입력값에 "\n"을 포함
print("> ")
user_input2 = gets
print user_input
