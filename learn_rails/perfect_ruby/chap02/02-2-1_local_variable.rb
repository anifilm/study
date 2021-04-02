# 지역 변수

foo = 'foo in toplevel'  # 지역 변수 선언

def display_foo
  puts foo  # NameError 발생 (지역 변수를 메서드에서 직접 참조할 수 없다.)
end

puts foo    # "foo in toplevel" 출력
display_foo
