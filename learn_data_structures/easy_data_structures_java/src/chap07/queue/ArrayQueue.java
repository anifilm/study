package chap07.queue;

public class ArrayQueue<E> implements QueueInterface<E> {
    private E queue[];
    private int front, tail, numItems;
    private static final int DEFALUT_CAPACITY = 64;
    private final E ERROR = null; // 임의의 에러 값

    public ArrayQueue() { // 생성자 1
        queue = (E[]) new Object[DEFALUT_CAPACITY];
        front = 0;
        tail = DEFALUT_CAPACITY - 1;
        numItems = 0;
    }

    public ArrayQueue(int n) { // 생성자 2
        queue = (E[]) new Object[n];
        front = 0;
        tail = n - 1;
        numItems = 0;
    }

    // [알고리즘 7-1] 구현: 큐에 요소 삽입하기
    public void enqueue(E newItem) {
        if (isFull()) {
            System.out.println("Queue Full!");
        } else {
            tail = (tail + 1) % queue.length;
            queue[tail] = newItem;
            ++numItems;
        }
    }

    // [알고리즘 7-2] 구현: 큐가 꽉 찼는지 확인하기
    public boolean isFull() {
        return (numItems == queue.length);
    }

    // [알고리즘 7-3] 구현: 큐에서 요소 삭제하기
    public E dequeue() {
        if (isEmpty()) return ERROR;
        else {
            E queueFront = queue[front];
            front = (front + 1) % queue.length;
            --numItems;
            return queueFront;
        }
    }

    // [알고리즘 7-5] 구현: 큐의 맨 앞 요소 알려주기
    public E front() {
        if (isEmpty()) return ERROR;
        else {
            return queue[front];
        }
    }

    // [알고리즘 7-4] 구현: 큐가 비었는지 확인하기
    public boolean isEmpty() {
        return (numItems == 0);
    }

    // [알고리즘 7-6] 구현: 큐 비우기
    public void dequeueAll() {
        queue = (E[]) new Object[queue.length];
        front = 0;
        tail = queue.length - 1;
        numItems = 0;
    }

	//////////////////////////////////////////////////////////////////
	public void printAll() {
		int j = front;
		System.out.print("PrintAll: ");
		for(int i = 0; i < numItems; i++) {
			System.out.print(queue[j] + " ");
			j = (j + 1) % queue.length;
		}
		System.out.println();
	}
} // 코드 7-2
