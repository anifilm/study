package chap07.queue;

import chap05.list.LinkedList;

public class InheritedQueue<E> extends LinkedList<E> implements QueueInterface<E> {
    public InheritedQueue() {
        super();
    }

    public void enqueue(E newItem) {
        append(newItem);
    }

    public E dequeue() {
        return remove(0);
    }

    public E front() {
        return get(0);
    }

    public void dequeueAll() {
        clear();
    }
}
