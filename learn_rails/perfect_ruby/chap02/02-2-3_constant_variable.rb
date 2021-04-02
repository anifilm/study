# 상수

FOO_BAR = 'bar'  # 상수 선언은 영문 대문자를 사용한다.

puts FOO_BAR     # bar

FOO_BAR = 'foo'  # warning: already initialized constant FOO_BAR

puts FOO_BAR     # foo (경고는 출력하지만 재 대입이 가능하다.)


=begin 메서드 안에서는 상수를 정의할 수 없다.

def set_foo
  FOO_BAR = 'bar'  # dynamic constant assignment (SyntaxError)
end

=end
