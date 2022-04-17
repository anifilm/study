/* Q7
일반적으로 덱(deck)이라는 양방향 대기열(deque/double ended queue)은 아래 그림처럼 시작과 끝 지점에서
양쪽으로 데이터를 인덱(deck)하거나 디덱(deck)하는 자료구조입니다. 양방향 대기열을 구현하는 클래스 IntDeque를 만드세요.
이때 덱에 저장하는 데이터의 자료형은 int형으로 합니다.
 */
package chap04.section2;

public class Q7_IntDeque {
    private int max;    // 덱(deck) 용량
    private int front;  // 맨 앞의 커서
    private int rear;   // 맨 뒤의 커서
    private int num;    // 현재 데이터 수
    private int[] que;  // 덱(deck)의 본체

    // 실행시 예외: 덱(deck)이 비어 있음
    public class EmptyIntStackException extends RuntimeException {
        public EmptyIntStackException() {}
    }
    // 실행시 예외: 덱(deck)이 가득 참
    public class OverflowIntStackException extends RuntimeException {
        public OverflowIntStackException() {}
    }

    // 생성자
    public Q7_IntDeque(int capacity) {
        num = front = rear = 0;
        max = capacity;
        try {
            que = new int[max];  // 덱(deck) 본체용 배열을 생성
        }
        catch (OutOfMemoryError e) {  // 생성할 수 없음
            max = 0;
        }
    }
    // 덱(deck)에 데이터를 front쪽부터 인큐
    public int enqueFront(int x) throws OverflowIntStackException {
        if (num >= max)  // 덱(deck)가 가득 참
            throw new OverflowIntStackException();
        num++;
        if (--front < 0)
            front = max - 1;
        que[front] = x;
        return x;
    }
    // 덱(deck)에 데이터를 rear쪽부터 인큐
    public int enqueRear(int x) throws OverflowIntStackException {
        if (num >= max)  // 덱(deck)가 가득 참
            throw new OverflowIntStackException();
        que[rear++] = x;
        num++;
        if (rear == max)
            rear = 0;
        return x;
    }
    // 덱(deck)에서 데이터를 front쪽부터 디큐
    public int dequeFront() throws EmptyIntStackException {
        if (num <= 0)  // 덱(deck)가 비어 있음
            throw new EmptyIntStackException();
        int x = que[front++];
        num--;  // 덱(deck)의 크기를 1 줄임
        if (front == max)
            front = 0;
        return x;
    }
    // 덱(deck)에서 데이터를 rear쪽부터 디큐
    public int dequeRear() throws EmptyIntStackException {
        if (num <= 0)  // 덱(deck)가 비어 있음
            throw new EmptyIntStackException();
        num--;  // 덱(deck)의 크기를 1 줄임
        if (--rear < 0)
            rear = max - 1;
        return que[rear];
    }
    // 덱(deck)에서 데이터를 피크 (가장 뒤에 있는 데이터를 확인)
    public int peekRear() throws EmptyIntStackException {
        if (num <= 0)  // 덱(deck)이 비어 있음
            throw new EmptyIntStackException();
        return que[rear == 0 ? max - 1 : rear - 1];
    }
    // 덱(deck)에서 x를 찾아 인덱스를 반환 (없으면 -1)
    public int indexOf(int x) {
        for (int i = 0; i < num; i++) {  // front 부터 선형 검색
            int idx = (i + front) % max;
            if (que[idx] == x)
                return i + front;  // 검색 성공
        }
        return -1;  // 검색 실패
    }
    // 덱(deck)에서 x를 찾아 front로 부터 몇 번째인지 반환 (없으면 0)
    public int search(int x) {
        for (int i = 0; i < num; i++) {  // front 부터 선형 검색
            int idx = (i + front) % max;
            if (que[idx] == x)
                return i + 1;  // 검색 성공
        }
        return 0;  // 검색 실패
    }
    // 덱(deck)을 비움
    public void clear() {
        num = front = rear = 0;
    }
    // 덱(deck)의 용량을 반환
    public int capacity() {
        return max;
    }
    // 덱(deck)에 쌓여 있는 데이터의 수를 반환
    public int size() {
        return num;
    }
    // 덱(deck)가 비어 있는가?
    public boolean isEmpty() {
        return num <= 0;
    }
    // 덱(deck)가 가득 찼는가?
    public boolean isFull() {
        return num >= max;
    }
    // 덱(deck) 안의 모든 데이터를 front → rear 순서로 출력
    public void dump() {
        if (num <= 0)
            System.out.println("덱(deck)가 비어 있습니다.");
        else {
            for (int i = 0; i < num; i++)
                System.out.print(que[(i + front) % max] + " ");
            System.out.println();
        }
    }
}
