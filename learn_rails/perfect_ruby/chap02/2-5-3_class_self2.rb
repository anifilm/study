# self

class Ruler
  attr_accessor :length

  def set_default_length
    self.length = 30
  end
end

ruler = Ruler.new
ruler.set_default_length

ruler.length  # => 30
