/* Q2
임의의 객체형 데이터를 쌓을 수 있는 제네릭 스택 클래스 Gstack<E>를 작성하세요.
 */
package chap04.section1;

public class Q2_Gstack<E> {
    private int max;  // 스택 용량
    private int ptr;   // 스택 포인터
    private E[] stk;  // 스택 본체

    // 실행시 예외: 스택이 비어 있음 (static으로 변경됨)
    public static class EmptyIntStackException extends RuntimeException {
        public EmptyIntStackException() {}
    }
    // 실행시 예외: 스택이 가득 참 (static으로 변경됨)
    public static class OverflowIntStackException extends RuntimeException {
        public OverflowIntStackException() {}
    }

    // 생성자
    public Q2_Gstack(int capacity) {
        ptr = 0;
        max = capacity;
        try {
            stk = (E[]) new Object[max];    // 스택 본체용 배열을 생성 (오브젝트를 형변환)
        }
        catch (OutOfMemoryError e) {  // 생성할 수 없음
            max = 0;
        }
    }
    // 스택에 데이터를 푸시
    public E push(E x) throws OverflowIntStackException {
        if (ptr >= max)  // 스택이 가득 참
            throw new OverflowIntStackException();
        return stk[ptr++] = x;
    }
    // 스택에서 데이터를 팝 (가장 위에 있는 데이터를 꺼낸다)
    public E pop() throws EmptyIntStackException {
        if (ptr <= 0)  // 스택이 비어 있음
            throw new EmptyIntStackException();
        return stk[--ptr];
    }
    // 스택에서 데이터를 피크 (가장 위에 있는 데이터를 확인)
    public E peek() throws EmptyIntStackException {
        if (ptr <= 0)  // 스택이 비어 있음
            throw new EmptyIntStackException();
        return stk[ptr - 1];
    }
    // 스택에서 x를 찾아 인덱스를 반환 (없으면 -1)
    public int indexOf(E x) {
        for (int i = ptr - 1; i >= 0; i--) {  // ptr에서 부터 선형 검색
            if (stk[i] == x)
                return i;  // 검색 성공
        }
        return -1;  // 검색 실패
    }
    // 스택을 비움
    public void clear() {
        ptr = 0;
    }
    // 스택의 용량을 반환
    public int capacity() {
        return max;
    }
    // 스택에 쌓여 있는 데이터의 수를 반환
    public int size() {
        return ptr;
    }
    // 스택이 비어 있는가?
    public boolean isEmpty() {
        return ptr <= 0;
    }
    // 스택이 가득 찼는가?
    public boolean isFull() {
        return ptr >= max;
    }
    // 스택 안의 모든 데이터를 바닥 → 꼭대기 순서로 출력
    public void dump() {
        if (ptr <= 0)
            System.out.println("스택이 비어 있습니다.");
        else {
            for (int i = 0; i < ptr; i++)
                System.out.print(stk[i] + " ");
            System.out.println();
        }
    }
}
