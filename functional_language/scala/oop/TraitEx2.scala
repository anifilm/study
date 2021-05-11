// 트레잇

// 하나의 클래스가 여러 개의 트레잇을 상속받을 때는 with라는 키워드를 사용한다.

trait Talker {
  def say(topic: String): String
}

trait Pitcher {
  def throwFastBall():String = "Fast!"
  def throwCurveBall():String = "Curve!"
  def throwSliderBall():String = "Slider!"
}

class TooMuchTalker extends Talker with Pitcher {
  override def say(topic: String): String = {
    "Hi, I am a pitcher and too much talker."
  }
}

val chanho = new TooMuchTalker()
chanho.throwFastBall()
// Fast!
chanho.say("Hi")
// Hi, I am a pitcher and too much talker.
