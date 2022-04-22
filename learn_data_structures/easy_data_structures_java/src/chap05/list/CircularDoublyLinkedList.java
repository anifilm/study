package chap05.list;

public class CircularDoublyLinkedList<E> implements ListInterface<E> {
    private BidirectionalNode<E> head;
    private int numItems;

    public CircularDoublyLinkedList() { // 생성자
        numItems = 0;
        head = new BidirectionalNode<>(null); // 더미 헤드
        head.next = head.prev = head;
    }

    public void add(int index, E x) { // 첫번째 요소는 0번 요소
        if (index >= 0 && index <= numItems) {
            BidirectionalNode<E> prevNode = getNode(index - 1);
            BidirectionalNode<E> newNode = new BidirectionalNode<>(prevNode, x, prevNode.next);
            newNode.next.prev = newNode;
            prevNode.next = newNode;
            numItems++;
        } else {
            /* 에러 처리 */
        }
    }

    public void append(E x) {
        BidirectionalNode<E> prevNode = head.prev;
        BidirectionalNode<E> newNode = new BidirectionalNode<>(prevNode, x, head);
        prevNode.next = newNode;
        head.prev = newNode;
        numItems++;
    }

    public E remove(int index) {
        if (index >= 0 && index <= numItems - 1) {
            BidirectionalNode<E> currNode = getNode(index);
            currNode.prev.next = currNode.next;
            currNode.next.prev = currNode.prev;
            numItems--;
            return currNode.item;
        } else {
            return null;
        }
    }

    public boolean removeItem(E x) {
        BidirectionalNode<E> currNode = head; // 더미 헤드
        for (int i = 0; i <= numItems - 1; i++) {
            currNode = currNode.next;
            if (((Comparable)(currNode.item)).compareTo(x) == 0) {
                currNode.prev.next = currNode.next;
                currNode.next.prev = currNode.prev;
                numItems--;
                return true;
            }
        }
        return false;
    }

    public E get(int index) {
        if (index >= 0 && index <= numItems - 1) {
            return getNode(index).item;
        } else {
            return null; // 에러
        }
    }

    public void set(int index, E x) {
        if (index >= 0 && index <= numItems - 1) {
            getNode(index).item = x;
        } else {
            /* 에러 처리 */
        }
    }

    public BidirectionalNode<E> getNode(int index) { // 첫번째 요소는 0번 요소
        if (index >= -1 && index <= numItems - 1) {
            BidirectionalNode<E> currNode = head;
            if (index < numItems / 2) {
                for (int i = 0; i <= index; i++) {
                    currNode = currNode.next;
                }
            } else {
                for (int i = numItems - 1; i >= index; i--) {
                    currNode = currNode.prev;
                }
            }
            return currNode;
        } else {
            return null; // 에러
        }
    }

    public final int NOT_FOUND = -12345;
    public int indexOf(E x) {
        BidirectionalNode<E> currNode = head;
        for (int i = 0; i <= numItems - 1; i++) {
            currNode = currNode.next;
            if (((Comparable)(currNode.item)).compareTo(x) == 0)
                return i;
        }
        return NOT_FOUND;
    }

    public int len() {
        return numItems;
    }

    public boolean isEmpty() {
        return numItems == 0;
    }

    public void clear() {
        numItems = 0;
        head.next = head.prev = head;
    }

    ///////////////////////////////////////////////////////////////////////
    public void printAll() {
        BidirectionalNode<E> t;
        BidirectionalNode<E> currNode = head;
        System.out.print("Print list (#items=" + numItems + ") ");
        for(t=head.next; t != head; t = t.next)
            System.out.print(t.item + " ");
        System.out.println();
    }
} // 코드 5-14
