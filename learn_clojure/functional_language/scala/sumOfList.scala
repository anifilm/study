// head와 tail

def sumOfList(list: List[Int]): Int = {
  if (list == Nil) 0
  else list.head + sumOfList(list.tail)
}

println(sumOfList(List(1, 2, 3)))
