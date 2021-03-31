package main;

import org.springframework.context.support.ClassPathXmlApplicationContext;

public class Main {
    public static void main(String[] args) {

        ClassPathXmlApplicationContext ctx = new
                ClassPathXmlApplicationContext("beans.xml");

        ctx.close();
    }
}
