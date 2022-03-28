package chap01_strategy;

// 추상 클래스 Duck 선언
public abstract class Duck {
    FlyBehavior flyBehavior;
    QuackBehavior quackBehavior;

    public Duck() {} // 생성자

    // 동적으로 오리의 행동을 변경할 수 있도록 setter 추가
    public void setFlyBehavior(FlyBehavior fb) {
        flyBehavior = fb;
    }
    // 동적으로 오리의 울음소리을 변경할 수 있도록 setter 추가
    public void setQuackBehavior(QuackBehavior qb) {
        quackBehavior = qb;
    }

    abstract void display(); // 추상 메서드

    public void performFly() {
        flyBehavior.fly();
    }

    public void performQuack() {
        quackBehavior.quack();
    }

    public void swim() {
        System.out.println("All ducks float, even decoys!");
    }
}
