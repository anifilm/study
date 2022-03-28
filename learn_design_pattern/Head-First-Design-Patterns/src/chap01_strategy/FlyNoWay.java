package chap01_strategy;

// FlyBehavior 인터페이스를 상속받아 FlyNoWay 클래스 구현
public class FlyNoWay implements FlyBehavior {
    public void fly() { // 추상 메서드를 통한 날지 못하는 상태(고무 오리나 가짜 오리같은)를 구현
        System.out.println("저는 날수 없어요!");
    }
}
