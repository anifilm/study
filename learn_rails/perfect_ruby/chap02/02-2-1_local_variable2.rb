# 지역 변수

greeting = "Hello, "
people = ['Alice', 'Bob']

people.each do |person|
  puts greeting + person  # "Hello, Alice"..등 출력 (블록 안에서는 지역 변수 참고 가능)
end

puts person  # NameError (블록 안에서 정의된 지역 변수는 블록 밖에서 참조할 수 없다.)
