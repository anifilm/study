package chap07.queue;

import chap05.list.Node;

public class LinkedQueue<E> implements QueueInterface<E> {
    private Node<E> tail;
    private final E ERROR = null; // 임의의 에러 값

    public LinkedQueue() {
        tail = null;
    }

    // [알고리즘 7-7] 구현: 큐에 요소 삽입하기
    public void enqueue(E newItem) {
        Node<E> newNode = new Node<>(newItem);
        if (isEmpty()) {
            newNode.next = newNode;
            tail = newNode;
        } else {
            newNode.next = tail.next;
            tail.next = newNode;
            tail = newNode;
        }
    }

    // [알고리즘 7-8] 구현: 큐에서 요소 삭제하기
    public E dequeue() {
        if (isEmpty()) return ERROR;
        else {
            Node<E> front = tail.next;
            if (front == tail) {
                tail = null;
            } else {
                tail.next = front.next;
            }
            return front.item;
        }
    }

    // [알고리즘 7-9] 구현: 큐의 맨 앞 요소 알려주기
    public E front() {
        if (isEmpty()) return ERROR;
        else {
            return tail.next.item; // tail.next: front
        }
    }

    // [알고리즘 7-10] 구현: 큐가 비었는지 확인하기
    public boolean isEmpty() {
        return (tail == null);
    }

    // [알고리즘 7-11] 구현: 큐 비우기
    public void dequeueAll() {
        tail = null;
    }

	/////////////////////////////////////////////////////
	public void printAll() {
		Node<E> t = tail;
		System.out.println("Queue from front to tail");
		if (!isEmpty()) {
			do {
				t = t.next;
				System.out.print(t.item + " ");
			} while (t != tail);
            System.out.println();
        } else {
            System.out.println("Empty Queue!");
        }
	}
}
