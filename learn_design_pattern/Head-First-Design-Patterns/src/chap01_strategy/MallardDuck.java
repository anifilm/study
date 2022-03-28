package chap01_strategy;

// 말라드덕은 Duck을 상속 받는다.
public class MallardDuck extends Duck {
    public MallardDuck() { // 생성자 오버라이드
        quackBehavior = new Quack();
        flyBehavior = new FlyWithWings();
    }

    public void display() {
        System.out.println("I'm a real Mallard duck");
    }
}
