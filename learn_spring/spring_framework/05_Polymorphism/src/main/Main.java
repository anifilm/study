package main;

import beans.Hello;
import beans.HelloEn;
import beans.HelloKo;

public class Main {
    public static void main(String[] args) {

        //Hello hello = new HelloEn();
        Hello hello = new HelloKo();
        callMethod(hello);

        //Hello hello2 = new HelloEn();
        Hello hello2 = new HelloKo();
        callMethod(hello2);
    }

    public static void callMethod(Hello hello) {
        hello.sayHello();
    }
}
