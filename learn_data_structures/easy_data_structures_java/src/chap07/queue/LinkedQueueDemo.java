package chap07.queue;

public class LinkedQueueDemo {
    public static void main(String[] args) {

        System.out.println("Linked Queue Demo!");

        LinkedQueue<String> q = new LinkedQueue<>();

        q.enqueue("test 1");
        q.enqueue("test 2");
        q.enqueue("test 3");
        System.out.println("dequeue(): " + q.dequeue());
        System.out.println("isEmpty(): " + q.isEmpty());

        System.out.print("printAll(): ");
        q.printAll();
    }
}
