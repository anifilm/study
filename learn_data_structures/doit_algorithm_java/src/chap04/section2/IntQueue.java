// int형 큐
package chap04.section2;

public class IntQueue {
    private int max;    // 큐 용량
    private int front;  // 첫 번째 요소의 커서
    private int rear;   // 마지막 요소의 커서
    private int num;    // 현재 데이터 수
    private int[] que;  // 큐 본체

    // 실행시 예외: 큐이 비어 있음
    public class EmptyIntStackException extends RuntimeException {
        public EmptyIntStackException() {}
    }
    // 실행시 예외: 큐이 가득 참
    public class OverflowIntStackException extends RuntimeException {
        public OverflowIntStackException() {}
    }

    // 생성자
    public IntQueue(int capacity) {
        num = front = rear = 0;
        max = capacity;
        try {
            que = new int[max];  // 큐 본체용 배열을 생성
        }
        catch (OutOfMemoryError e) {  // 생성할 수 없음
            max = 0;
        }
    }
    // 큐에 데이터를 인큐
    public int enque(int x) throws OverflowIntStackException {
        if (num >= max)  // 큐가 가득 참
            throw new OverflowIntStackException();
        que[rear++] = x;
        num++;
        if (rear == max)
            rear = 0;
        return x;
    }
    // 큐에서 데이터를 디큐 (가장 앞에 있는 데이터를 꺼낸다)
    public int deque() throws EmptyIntStackException {
        if (num <= 0)  // 큐가 비어 있음
            throw new EmptyIntStackException();
        int x = que[front++];
        num--;  // 큐의 크기를 1 줄임
        if (front == max)
            front = 0;
        return x;
    }
    // 큐에서 데이터를 피크 (가장 앞에 있는 데이터를 확인)
    public int peek() throws EmptyIntStackException {
        if (num <= 0)  // 큐이 비어 있음
            throw new EmptyIntStackException();
        return que[front];
    }
    // 큐에서 x를 찾아 인덱스를 반환 (없으면 -1)
    public int indexOf(int x) {
        for (int i = 0; i < num; i++) {  // front 부터 선형 검색
            int idx = (i + front) % max;
            if (que[idx] == x)
                return idx;  // 검색 성공
        }
        return -1;  // 검색 실패
    }
    // 큐을 비움
    public void clear() {
        num = front = rear = 0;
    }
    // 큐의 용량을 반환
    public int capacity() {
        return max;
    }
    // 큐에 쌓여 있는 데이터의 수를 반환
    public int size() {
        return num;
    }
    // 큐가 비어 있는가?
    public boolean isEmpty() {
        return num <= 0;
    }
    // 큐가 가득 찼는가?
    public boolean isFull() {
        return num >= max;
    }
    // 큐 안의 모든 데이터를 front → rear 순서로 출력
    public void dump() {
        if (num <= 0)
            System.out.println("큐가 비어 있습니다.");
        else {
            for (int i = 0; i < num; i++)
                System.out.print(que[(i + front) % max] + " ");
            System.out.println();
        }
    }
}
