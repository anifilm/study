// 연습 문제
// 앞서 나온 연습 문제에서 작성했던 filterOdd 함수를 패턴 매치를 사용하도록 수정하라.

def filterOdd(list: List[Int]): List[Int] = {
  list match {
    case Nil => Nil
    case head :: tail if head % 2 == 0 => head :: filterOdd(tail)
    case head :: tail => filterOdd(tail)
  }
}

println(filterOdd(List(1, 2, 3, 4, 5)))
