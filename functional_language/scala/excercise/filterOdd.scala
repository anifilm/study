// 연습 문제
// 숫자로 구성된 리스트를 인자로 받아서 짝수인 숫자만 포함하는 리스트를 반환하는 filterOdd 함수를 재귀적으로 작성하라.

def filterOdd(list: List[Int]): List[Int] = {
  if (list == Nil) Nil
  else if (list.head % 2 == 0)
      list.head :: filterOdd(list.tail)
  else filterOdd(list.tail)
}

println(filterOdd(List(1, 2, 3, 4, 5)))
