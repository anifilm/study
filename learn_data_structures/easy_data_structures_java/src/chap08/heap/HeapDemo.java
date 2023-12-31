package chap08.heap;

public class HeapDemo  {
    public static void main(String[] args) {

        System.out.println("Heap Demo!");

        Heap<Integer> h = new Heap<>(5);

        try {
            h.insert(1);
            h.insert(10);
            h.clear();
            h.insert(30);
            h.insert(10);
            h.insert(30);
            h.insert(20);
            h.insert(40);
            h.deleteMax();
            h.insert(1);
            h.insert(3); // 여기서 PQException
            h.deleteMax();
        } catch (PQException e) {
            String msg = e.getMessage();
            System.out.println(msg);
        }
    }
}
