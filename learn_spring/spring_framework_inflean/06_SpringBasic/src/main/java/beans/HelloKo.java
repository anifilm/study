package beans;

public class HelloKo implements Hello {

    @Override
    public void sayHello() {
        System.out.println("안녕하세요!");
    }
}
