package chap01_strategy;

public class Squeak implements QuackBehavior {
    public void quack() {
        System.out.println("삑");
    }
}
