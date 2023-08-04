package main;

import beans.HelloEn;
import beans.HelloKo;

public class Main {
    public static void main(String[] args) {

        //HelloEn hello = new HelloEn();
        HelloKo hello = new HelloKo();
        callMethod(hello);

        //HelloEn hello2 = new HelloEn();
        HelloKo hello2 = new HelloKo();
        callMethod(hello2);
    }

    //public static void callMethod(HelloEn hello) {
    public static void callMethod(HelloKo hello) {
        hello.sayHello();
    }
}
