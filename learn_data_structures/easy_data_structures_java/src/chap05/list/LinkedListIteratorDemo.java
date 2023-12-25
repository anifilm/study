package chap05.list;

public class LinkedListIteratorDemo {
    public static void main(String[] args) {

        LinkedList list = new LinkedList();
        list.add(0, 200);
        list.add(0, 100);
        list.append(500);
        list.append(600);
        list.append(700);

        System.out.println("Iterator example: Linked List!");

        LinkedListIterator iter = new LinkedListIterator(list);
        while (iter.hasNext()) {
            System.out.println("next() = " + iter.next().item);
        }

        System.out.println("Iterator example2: Linked List!");

        LinkedListIterator2 iter2 = new LinkedListIterator2(list);
        while (iter2.hasNext()) {
            System.out.println("next() = " + iter2.next().item);
        }

        LinkedList list2 = new LinkedList();
        list2.add(0, -200);
        list2.add(1, 300);
        list2.append(500);
        list2.append(-600);
        list2.append(-700);

        System.out.println("Item Iterator example: Linked List!");

        LinkedListItemIterator iter3 = new LinkedListItemIterator(list2);
        while (iter3.hasNext())
            System.out.println("next() = " + iter3.next());

        System.out.println("Negative Item Iterator example: Linked List!");

        NegativeItemIterator iter4 = new NegativeItemIterator(list2);
        while (iter4.hasNext())
            System.out.println("next() = " + iter4.next());
    }
}
