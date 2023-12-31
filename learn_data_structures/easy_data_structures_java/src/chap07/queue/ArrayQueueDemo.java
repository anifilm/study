package chap07.queue;

public class ArrayQueueDemo {
    public static void main(String[] args) {

        System.out.println("Array Queue Demo!");

        ArrayQueue<String> s = new ArrayQueue<>();

        s.enqueue("test 1");
        s.enqueue("test 2");
        s.enqueue("test 3");
        System.out.println("dequeue(): " + s.dequeue());

        System.out.print("printAll(): ");
        s.printAll();
    }
}
