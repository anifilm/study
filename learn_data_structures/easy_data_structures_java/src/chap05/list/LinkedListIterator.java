package chap05.list;

import java.util.Iterator;

public class LinkedListIterator implements Iterator<Node> {
    private Node current;

    public LinkedListIterator(LinkedList list) {
        current = list.getNode(-1); // 더미 헤드
    }

    public boolean hasNext() {
        return current.next != null;
    }

    public Node next() {
        return current = current.next;
    }
}
