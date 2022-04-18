package chap05.list;

public class LinkedList<E> implements ListInterface<E> {
    private Node<E> head;
    private int numItems;

    public LinkedList() { // 생성자
        head = new Node<>(null, null); // 더미 헤드
        numItems = 0;
    }

    // [알고리즘 5-10] 구현: 연결 리스트에 요소 x 삽입하기
    public void add(int index, E item) {
        if (index >= 0 && index <= numItems) {
            Node<E> prevNode = getNode(index - 1);
            Node<E> newNode = new Node<>(item, prevNode.next);
            prevNode.next = newNode;
            numItems++;
        }
    }

    public void append(E item) {
        Node<E> prevNode = head; // 더미 노드
        while (prevNode.next != null) {
            prevNode = prevNode.next;
        }
        Node<E> newNode = new Node<>(item, null);
        prevNode.next = newNode;
        numItems++;
    }

    // [알고리즘 5-12] 구현: 연결 리스트의 요소 삭제하기
    public E remove(int index) {
        if (index >= 0 && index < numItems) {
            Node<E> prevNode = getNode(index - 1);
            Node<E> currNode = prevNode.next;
            prevNode.next = currNode.next;
            numItems--;
            return currNode.item;
        } else {
            return null;
        }
    }

    public boolean removeItem(E x) {
        Node<E> currNode = head; // 더미 헤드
        Node<E> prevNode;
        for (int i = 0; i < numItems; i++) {
            prevNode = currNode;
            currNode = currNode.next;
            if (((Comparable)(currNode.item)).compareTo(x) == 0) {
                prevNode.next = currNode.next;
                numItems--;
                return true;
            }
        }
        return false; // not found
    }

    // [알고리즘 5-13] 구현: 연결 리스트의 k번째 요소 알려주기
    public E get(int index) {
        if (index >= 0 && index <= numItems - 1) {
            return getNode(index).item;
        } else {
            return null; // 에러
        }
    }

    public Node<E> getNode(int index) {
        if (index >= -1 && index <= numItems - 1) {
            Node<E> currNode = head; // 더미 노드
            for (int i = 0; i <= index; i++) {
                currNode = currNode.next;
            }
            return currNode;
        } else {
            return null;
        }
    }

    // [알고리즘 5-14] 구현: 연결 리스트의 k번째 요소를 x로 대체하기
    public void set(int index, E x) {
        if (index >= 0 && index <= numItems - 1) {
            getNode(index).item = x;
        } else {
            /* 에러 처리 */
        }
    }

    // [알고리즘 5-15] 구현: 요소 x가 연결 리스트의 몇번째 요소인지 알려주기
    public final int NOT_FOUND = -12345;
    public int indexOf(E x) {
        Node<E> currNode = head; // 더미 노드
        int i;
        for (i = 0; i < numItems; i++) {
            currNode = currNode.next;
            if (((Comparable)(currNode.item)).compareTo(x) == 0) {
                return i;
            }
        }
        return NOT_FOUND; // not found
    }

    // [알고리즘 5-16(1)] 구현: 리스트의 총 요소수 알려주기
    public int len() {
        return numItems;
    }

    // [알고리즘 5-16(2)] 구현: 리스트가 비었는지 알려주기
    public boolean isEmpty() {
        return numItems == 0;
    }

    // [알고리즘 5-16(3)] 구현: 리스트 깨끗이 청소하기
    public void clear() {
        head = new Node<>(null, null);
        numItems = 0;
    }

    ///////////////////////////////////////////////////////////////////////
    public void printAll() {
        Node<E> t;
        System.out.print("Print list (#items=" + numItems + ") ");
        for(t=head.next; t != null; t = t.next) {
            System.out.print(t.item + " ");
        }
        System.out.println();
    }
} // 코드 5-9
