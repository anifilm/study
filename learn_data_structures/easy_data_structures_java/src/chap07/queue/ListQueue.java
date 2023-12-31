package chap07.queue;

import chap05.list.ArrayList;
import chap05.list.ListInterface;

public class ListQueue<E> implements QueueInterface<E> {
    private ListInterface<E> list;

    public ListQueue() {
        list = new ArrayList<E>();
    }

    public void enqueue(E newItem) {
        list.append(newItem);
    }

    public E dequeue() {
        return list.remove(0);
    }

    public E front() {
        return list.get(0);
    }

    public boolean isEmpty() {
        return list.isEmpty();
    }

    public void dequeueAll() {
        list.clear();
    }

	////////////////////////////////////
	public void printAll() {
		list.printAll();
	}
}
