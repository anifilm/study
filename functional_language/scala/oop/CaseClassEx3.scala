// 케이스 클래스

// 케이스 클래스와 패턴 매치를 활요한 메시지 송수신 예제

abstract class Message

case class GreetingMessage(sender: String, msg: String) extends Message
case class FarewellMessage(sender: String, msg: String) extends Message

def replayToMessage(message: Message): Unit = {
  message match {
    case GreetingMessage(sender, msg) =>
      println(s"$sender: $msg")
      println(s"you: Nice to meet you! $sender")
    case FarewellMessage(sender, msg) =>
      println(s"$sender: $msg")
      println(s"you: Good Bye! $sender")
  }
}

val m1 = GreetingMessage("Jack", "Hi, I'm from CTU")
val m2 = FarewellMessage("Jack", "Sorry, I leave CTU")

replayToMessage(m1)
// Jack: Hi, I'm from CTU
// you: Nice to meet you! Jack

replayToMessage(m2)
// Jack: Sorry, I leave CTU
// you: Good Bye! Jack
