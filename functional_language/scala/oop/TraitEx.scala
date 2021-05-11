// 트레잇

// 트레잇(Trait)은 자바의 인터페이스(Interface)와 비슷하다. 트레잇을 상속받은 클래스는 트레잇에 정의된 메서드를 사용하거나 재정의할 수 있다.

trait Talker {
  def say(topic: String): String
}

class TooMuchTalker extends Talker {
  override def say(topic: String): String = {
    topic * 3
  }
}

val chanho = new TooMuchTalker()
chanho.say("Hi")
// HiHiHi

class TooLessTalker extends Talker {
  override def say(topic: String): String =
    "nothing to say"
}

import scala.collection.mutable.ArrayBuffer

val talkers = ArrayBuffer.empty[Talker]
talkers.append(new TooMuchTalker())
talkers.append(new TooLessTalker())
talkers.foreach(talker => println(talker.say("Hi")))
// HiHiHi
// nothing to say

/*
트레잇과 추상 클래스(Abstract Class)는 무슨 차이가 있을가?

- 하나의 클래스는 하나의 추상 클래스만을 상속받을 수 있다.
- 하나의 클래스는 여러 개의 트레잇을 상속받을 수 있다.

하나의 클래스가 여러 개의 트레잇을 상속받을 때는 with라는 키워드를 사용한다.

*/
