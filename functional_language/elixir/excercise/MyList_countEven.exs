defmodule MyList do
  def countEven([a]) do
    1
  end

  def countEven([head|tail]) do
    head + countEven(tail)
  end
end

# MyList.sum([1, 2, 3])
# 6
