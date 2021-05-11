// 클래스

/* 스칼라에서는 다음과 같이 클래스(class)를 정의할 수 있다.
class A {
  var field1: Int = 0

  def this(value: Int) = {
    this()
    this.field1 = value
  }

  def print() = {
    println(field1)
  }
} */

class A(f1: Int) {
  var field1: Int = f1

  def print() = {
    println(field1)
  }
}

val a = new A(1)
a.print // 1

val b = new A(2)
b.print // 2
