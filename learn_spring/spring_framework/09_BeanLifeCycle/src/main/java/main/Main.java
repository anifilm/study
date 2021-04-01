package main;

import beans.TestBean1;
import beans.TestBean2;
import beans.TestBean3;
import beans.TestBean4;

import org.springframework.context.support.ClassPathXmlApplicationContext;

public class Main {
    public static void main(String[] args) {

        ClassPathXmlApplicationContext ctx = new
                ClassPathXmlApplicationContext("beans.xml");

        TestBean1 t1 = ctx.getBean("t1", TestBean1.class);
        System.out.printf("t1: %s\n", t1);
        System.out.println("------------------------------");

        TestBean2 t2 = ctx.getBean("t2", TestBean2.class);
        System.out.printf("t2: %s\n", t2);
        System.out.println("------------------------------");

        TestBean3 t3 = ctx.getBean("t3", TestBean3.class);
        System.out.printf("t3: %s\n", t3);
        System.out.println("------------------------------");

        TestBean4 t4 = ctx.getBean("t4", TestBean4.class);
        System.out.printf("t4: %s\n", t4);
        System.out.println("------------------------------");

        ctx.close();
    }
}
