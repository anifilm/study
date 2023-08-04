package main;

import beans.DataBean;
import beans.TestBean;
import org.springframework.context.support.ClassPathXmlApplicationContext;

import java.util.List;
import java.util.Map;
import java.util.Properties;
import java.util.Set;

public class Main {
    public static void main(String[] args) {

        ClassPathXmlApplicationContext ctx = new
                ClassPathXmlApplicationContext("beans.xml");

        TestBean t1 = ctx.getBean("t1", TestBean.class);

        List<String> list1 = t1.getList1();
        for (String str : list1) {
            System.out.printf("list1: %s\n", str);
        }

        List<Integer> list2 = t1.getList2();
        for (int val : list2) {
            System.out.printf("list2: %s\n", val);
        }

        List<DataBean> list3 = t1.getList3();
        for (DataBean obj : list3) {
            System.out.printf("list3: %s\n", obj);
        }
        System.out.println("------------------------------");

        Set<String> set1 = t1.getSet1();
        for (String str : set1) {
            System.out.printf("set1: %s\n", str);
        }

        Set<Integer> set2 = t1.getSet2();
        for (int val : set2) {
            System.out.printf("set2: %s\n", val);
        }

        Set<DataBean> set3 = t1.getSet3();
        for (DataBean obj : set3) {
            System.out.printf("set3: %s\n", obj);
        }
        System.out.println("------------------------------");

        Map<String, Object> map1 = t1.getMap1();

        String a1 = (String)map1.get("a1");
        int a2 = (Integer)map1.get("a2");
        DataBean a3 = (DataBean)map1.get("a3");
        DataBean a4 = (DataBean)map1.get("a4");
        List<String> a5 = (List<String>)map1.get("a5");

        System.out.printf("a1: %s\n", a1);
        System.out.printf("a2: %d\n", a2);
        System.out.printf("a3: %s\n", a3);
        System.out.printf("a4: %s\n", a4);

        for (String str : a5) {
            System.out.printf("a5: %s\n", str);
        }
        System.out.println("------------------------------");

        Properties prop1 = t1.getProp1();

        String p1 = prop1.getProperty("p1");
        String p2 = prop1.getProperty("p2");
        String p3 = prop1.getProperty("p3");

        System.out.printf("p1: %s\n", p1);
        System.out.printf("p2: %s\n", p2);
        System.out.printf("p3: %s\n", p3);
        System.out.println("------------------------------");

        ctx.close();
    }
}
