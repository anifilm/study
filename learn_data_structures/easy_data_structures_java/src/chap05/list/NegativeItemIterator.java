package chap05.list;

import java.util.Iterator;

public class NegativeItemIterator<E extends Comparable> implements Iterator {
    private Node<E> current;

    public NegativeItemIterator(LinkedList<E> list) {
        current = list.getNode(0); // 첫번째 노드
    }

    public boolean hasNext() {
        for ( ; current != null; current = current.next) {
            if (current.item.compareTo(0) < 0) {
                return true;
            }
        }
        return false;
    }

    public E next() {
        E tmp = current.item;
        current = current.next;
        return tmp;
    }
}
