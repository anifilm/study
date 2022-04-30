package chap06.stack;

public class LinkedStackDemo {
    public static void main(String[] args) {

        System.out.println("Linked Stack Demo!");

        LinkedStack<String> s = new LinkedStack<>();

        s.push("test 1");
        s.push("test 2");
        s.push("test 3");

        System.out.print("printAll(): ");
        s.printAll();

        System.out.println("pop(): " + s.pop());
        System.out.println("isEmpty?: " + s.isEmpty());
    }
}
