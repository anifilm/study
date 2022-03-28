package chap01_strategy;

// FlyBehavior 인터페이스를 상속받아 FlyWithWings 클래스 구현
public class FlyWithWings implements FlyBehavior {
    public void fly() { // 추상 메서드를 통한 fly 구현
        System.out.println("날고 있어요!");
    }
}
