// 오브젝트

// 클래스의 인스턴스를 단 하나만 만들도록 제한하는 디자인 패넡을 싱글턴(Singleton)이라 한다.
// 스칼라에서는 object라는 키워드를 사용하여 클래스를 정의하면 자동으로 싱글턴이 된다.

object C {
  var field1: Int = 0

  def print() = {
    println(field1)
  }
}

// 클래스를 object 키워드를 사용하여 정의하면, new 없이 C의 메서드를 사용하는 것이 가능해진다.
C.print // 0

/*
일반적으로 자바의 main 함수는 static이란 키워드를 사용하여 정적 메서드가 되도록 지정한다.

스칼라에서는 동일한 기능을 위해 object 클래스를 사용한다.

object Main {
  def main(args: Array[String]): Unit = {
    // 프로그램의 시작점
  }
}

*/
