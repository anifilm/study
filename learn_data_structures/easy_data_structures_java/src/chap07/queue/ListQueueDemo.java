package chap07.queue;

public class ListQueueDemo {
    public static void main(String[] args) {

        System.out.println("List Queue Demo!");

        ListQueue<String> q = new ListQueue<>();

        q.enqueue("test 1");
        q.enqueue("test 2");
        q.enqueue("test 3");
        System.out.println("dequeue(): " + q.dequeue());

        System.out.print("printAll(): ");
        q.printAll();
    }
}
