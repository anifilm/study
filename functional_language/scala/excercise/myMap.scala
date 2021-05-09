// 연습 문제
// 고차 함수 map을 패턴 매치와 재귀 함수를 사용하여 구현하라.

// println(List(1, 2, 3).map(i => i + 1))

def myMap(list: List[Int], fp: (Int) => Int): List[Int] = {
  def loop(list: List[Int], acc: List[Int]): List[Int] = {
    list match {
      case Nil => acc.reverse
      case head :: tail => loop(tail, fp(head) :: acc)
    }
  }
  loop(list, Nil)
}

val result = myMap(List(1, 2, 3), i => i + 1)
println(result)
