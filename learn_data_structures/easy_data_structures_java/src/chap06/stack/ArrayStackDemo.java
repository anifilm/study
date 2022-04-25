package chap06.stack;

public class ArrayStackDemo {
    public static void main(String[] args) {

        System.out.println("Array Stack Demo!");

        ArrayStack<Integer> list = new ArrayStack<>();

        list.push(300);
        list.push(200);
        list.push(100);
        System.out.print("printAll(): ");
        list.printAll();

        System.out.println("pop(): " + list.pop());
        System.out.print("printAll(): ");
        list.printAll();
    }
}
