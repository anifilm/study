// 케이스 클래스

// 케이스 클래스는 매우 민첩하게 정의하고 사용할 수 있어 스칼로 코드에서 많이 애용된다.
// 특히, 패턴 매치와 함께 사용하면 그 진가가 드러난다.

case class Person(name: String, score: Int)

val jack = Person("Jack", 88)
val tony = Perons("Tony", 67)

def isQualified(person: Person): Boolean = {
  person match {
    case Person(name, score) if score > 80 => true
    case _ => false
  }
}

isQualified(jack)
// true
isQualified(tony)
// false
