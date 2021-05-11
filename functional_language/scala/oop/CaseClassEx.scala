// 케이스 클래스

// 케이스 클래스(Case Class)를 사용하면 멤버 필드만 가지는 클래스를 쉽게 작성할 수 있다.

case class Person(name: String, age: Int, married: Boolean)

// 케이스 클래스의 인스턴스를 만들 때는 new를 사용하지 않는다.
val jack = Person("Jack", 35, true)

// 케이스 클래스에는 Getter나 Setter와 같은 멤버 필드에 접근하는 메서드가 없는 대신 다음과 같이 직접 참조할 수 있다.

jack.name
// Jack

jack.age
// 35

jack.married
// true

// 케이스 클래스의 각 멤버 필드는 기본적으로 Immutable이기 때문에 값을 재할당 할 수 없다.

// 그러나 케이스 클래스를 정의할 때 필드 멤버에 다음과 같이 명시작으로 var를 선언해 주면 재할당하는 것이 가능해진다.
case class Person2(var name: String, var age: Int, var married: Boolean)
val john = Person2("John", 32, false)

john.age = 33
john
// Person2 = Person2(John, 22, false)

// 케이스 클래스를 정의하면 자동으로 toString, equals, hashCode 메서드가 생성되므로 별도의 정의 없이 인스턴스를 출력하고, 비교할 수 있다.
println(jack)
// Person(Jack, 35, true)
jack == Person("Tony", 28, false)
// false
