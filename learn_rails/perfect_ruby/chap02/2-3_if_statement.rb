# 조건 분기와 진리값

if true
  puts 'Ping'
end           # "Ping" 출력

str = 'Ping'

if str
  puts str
end           # "Ping" 출력


if false
  puts 'Ping'
else
  puts 'Pong'
end           # "Pong" 출력


n = 2

if n.zero?
  puts '0이었다'
elsif n.even?
  puts '짝수였다'
elsif n.odd?
  puts '홀수였다'
else
  puts '모르겠다'
end           # "짝수였다" 출력
