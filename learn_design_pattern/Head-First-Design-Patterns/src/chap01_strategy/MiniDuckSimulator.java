package chap01_strategy;

public class MiniDuckSimulator {
    public static void main(String[] args) {
        Duck mallard = new MallardDuck(); // 객체 생성
        mallard.performQuack(); // fly 메서드 호출
        mallard.performFly(); // fly 메서드 호출

        Duck model = new ModelDuck(); // 객체 생성
        model.performFly(); // fly 메서드 호출
        model.setFlyBehavior(new FlyRockerPowered()); // setter를 통한 fly 메서드를 주입
        model.performFly(); // fly 메서드 호출
    }
}
