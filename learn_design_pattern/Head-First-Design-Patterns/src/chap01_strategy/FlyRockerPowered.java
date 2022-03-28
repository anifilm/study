package chap01_strategy;

public class FlyRockerPowered implements FlyBehavior {
    public void fly() {
        System.out.println("로켓 추진으로 날아갑니다.");
    }
}
