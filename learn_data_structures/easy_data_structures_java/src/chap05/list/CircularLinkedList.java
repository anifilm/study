package chap05.list;

public class CircularLinkedList<E> implements ListInterface<E> {
    private Node<E> tail;
    private int numItems;

    public CircularLinkedList() { // 생성자
        numItems = 0;
        tail = new Node(-1);
        tail.next = tail;
    }

    // [알고리즘 5-10] 구현: 연결 리스트에 요소 x 삽입하기
    public void add(int index, E x) { // 첫번째 요소는 0번 요소
        if (index >= 0 && index <= numItems) {
            Node<E> prevNode = getNode(index - 1);
            Node<E> newNode = new Node(x, prevNode.next);
            prevNode.next = newNode;
            if (index == numItems) {
                tail = newNode;
            }
            numItems++;
        }
    }

    public void append(E x) {
        Node<E> prevNode = tail; // 더미 노드
        Node<E> newNode = new Node(x, tail.next);
        prevNode.next = newNode;
        tail = newNode;
        numItems++;
    }

    // [알고리즘 5-12] 구현: 연결 리스트의 요소 삭제하기
    public E remove(int index) {
        if (index >= 0 && index <= numItems - 1) {
            Node<E> prevNode = getNode(index - 1);
            E rItem = prevNode.next.item;
            prevNode.next = prevNode.next.next;
            if (index == numItems) {
                tail = prevNode;
            }
            numItems--;
            return rItem;
        } else {
            return null;
        }
    }

    public boolean removeItem(E x) {
        Node<E> currNode = tail.next; // 더미 헤드
        Node<E> prevNode;
        for (int i = 0; i < numItems; i++) {
            prevNode = currNode;
            currNode = currNode.next;
            if (((Comparable) (currNode.item)).compareTo(x) == 0) {
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
        if (index >= -1 && index <= numItems) {
            Node<E> currNode = tail.next; // 더미 헤드
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

    public int indexOf(E x) { // 요소 x의 인덱스를 반환
        Node<E> currNode = tail.next; // 더미 노드
        for (int i = 0; i <= numItems - 1; i++) {
            currNode = currNode.next;
            if (((Comparable) (currNode.item)).compareTo(x) == 0) {
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
        numItems = 0;
        tail = new Node(-1);
        tail.next = tail;
    }

    ///////////////////////////////////////////////////////////////////////
    public void printAll() {
        Node<E> head = tail.next; // 더미 헤드
        System.out.print("Print list (#items=" + numItems + ") ");
        for (Node<E> t = head.next; t != head; t = t.next)
            System.out.print(t.item + " ");
        System.out.println();
    }
} // 코드 5-11
