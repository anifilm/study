# 클래스 메서드

class Ruler
  attr_accessor :length

  def self.pair
    [Ruler.new, Ruler.new]
  end
end

Ruler.pair  # => [#<Ruler:0x000000000641cc50>, #<Ruler:0x000000000641cc28>]
