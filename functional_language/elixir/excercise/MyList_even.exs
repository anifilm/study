defmodule MyList do
  def even([one]) do
    if rem(one, 2) == 0 do
      [one]
    else
      []
    end
  end

  def even([head|tail]) do
    if rem(head, 2) == 0 do
      [head] ++ even(tail)
    else
      even(tail)
    end
  end
end

# MyList.even([1, 2, 3, 4, 5])
# [2, 4]
