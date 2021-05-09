// 리스트에 대한 패턴 매치

def sumOfList(list: List[Int]): Int = {
  list match {
    case Nil => 0
    case head :: tail => head + sumOfList(tail)
  }
}

println(sumOfList(List(1, 2, 3)))
