package chap05.list;

import java.util.Iterator;

public class LinkedListIterator2 implements Iterator<Node> {
    private Node nextNode;

    public LinkedListIterator2(LinkedList list) {
        nextNode = list.getNode(0); // 첫번째 노드
    }

    public boolean hasNext() {
        return nextNode != null;
    }

    public Node next() {
        Node tmp = nextNode;
        nextNode = nextNode.next;
        return tmp;
    }
}
