# self

class Ruler
  attr_accessor :length

  def display_length
    # Ruler#length의 반환 값을 출력
    puts length  # self 생략
  end
end

ruler = Ruler.new
ruler.length = 30

ruler.display_length  # 30 출력
