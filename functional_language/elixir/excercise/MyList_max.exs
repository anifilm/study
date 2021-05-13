defmodule MyList do
  maxValue = 0
  def max([a]) do
    a
  end

  def max([head|tail]) do
    if maxValue < head do
      maxValue = head
    end
      max(tail)
  end
end

# MyList.max([1, 2, 3])
# 3
