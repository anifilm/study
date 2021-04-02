# 인스턴스 변수

class Ruler
  def length=(val)
    @length = val
  end

  def length
    @length
  end
end

ruler = Ruler.new
ruler.length = 30

ruler.length  # => 30
