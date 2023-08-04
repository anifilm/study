package main;

import beans.Hello;
import org.springframework.context.support.ClassPathXmlApplicationContext;

public class Main {
    public static void main(String[] args) {
        // beans.xml 파일을 로딩한다.
        ClassPathXmlApplicationContext ctx = new
                ClassPathXmlApplicationContext("beans.xml"); // Resources 폴더 설정을 기준으로 한다.

        // xml에 정의한 bean 객체의 주소값을 가져온다.
        Hello hello = (Hello) ctx.getBean("hello");
        callMethod(hello);

        Hello hello2 = ctx.getBean("hello", Hello.class);
        callMethod(hello2);

        ctx.close();
    }

    public static void callMethod(Hello hello) {
        hello.sayHello();
    }
}
