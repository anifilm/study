package chap01_strategy;

public class ModelDuck extends Duck {
    public ModelDuck() { // 생성자 오버라이드
        flyBehavior = new FlyNoWay();
        quackBehavior = new Quack();
    }

    public void display() {
        System.out.println("저는 모형 오리입니다.");
    }
}
