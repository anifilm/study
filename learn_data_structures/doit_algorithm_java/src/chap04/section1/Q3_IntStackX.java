/* Q3
하나의 배열을 공유하여 2개의 스택을 구현하는 int형 데이터용 스택 클래스를 만드세요. 스택에 저장하는 데이터는
int형 값으로 아래 그림처럼 배열의 처음과 끝을 사용하세요.
 */
package chap04.section1;

public class Q3_IntStackX {
    private int max;  // 스택 용량 (A, B의 합계)
    private int ptrA;   // 스택 포인터 A
    private int ptrB;   // 스택 포인터 B
    private int[] stk;  // 스택 본체

    public enum AorB {
        StackA, StackB
    };

    // 실행시 예외: 스택이 비어 있음
    public class EmptyIntStackException extends RuntimeException {
        public EmptyIntStackException() {}
    }
    // 실행시 예외: 스택이 가득 참
    public class OverflowIntStackException extends RuntimeException {
        public OverflowIntStackException() {}
    }

    // 생성자
    public Q3_IntStackX(int capacity) {
        ptrA = 0;
        ptrB = capacity - 1;
        max = capacity;
        try {
            stk = new int[max];    // 스택 본체용 배열을 생성
        }
        catch (OutOfMemoryError e) {  // 생성할 수 없음
            max = 0;
        }
    }
    // 스택에 데이터를 푸시
    public int push(AorB sw, int x) throws OverflowIntStackException {
        if (ptrA >= ptrB + 1)  // 스택이 가득 참
            throw new OverflowIntStackException();
        switch (sw) {
            case StackA:
                stk[ptrA++] = x;
                break;
            case StackB:
                stk[ptrB--] = x;
                break;
        }
        return x;
    }
    // 스택에서 데이터를 팝 (가장 위에 있는 데이터를 꺼낸다)
    public int pop(AorB sw) throws EmptyIntStackException {
        int x = 0;
        switch (sw) {
            case StackA:
                if (ptrA <= 0)  // 스택 A가 비어 있음
                    throw new EmptyIntStackException();
                x = stk[--ptrA];
                break;
            case StackB:
                if (ptrB >= max - 1)  // 스택 B가 비어 있음
                    throw new EmptyIntStackException();
                x = stk[++ptrB];
                break;
        }
        return x;
    }
    // 스택에서 데이터를 피크 (가장 위에 있는 데이터를 확인)
    public int peek(AorB sw) throws EmptyIntStackException {
        int x = 0;
        switch (sw) {
            case StackA:
                if (ptrA <= 0)  // 스택 A가 비어 있음
                    throw new EmptyIntStackException();
                x = stk[ptrA - 1];
                break;
            case StackB:
                if (ptrB >= max - 1)  // 스택 B가 비어 있음
                    throw new EmptyIntStackException();
                x = stk[ptrB + 1];
                break;
        }
        return x;
    }
    // 스택에서 x를 찾아 인덱스를 반환 (없으면 -1)
    public int indexOf(AorB sw, int x) {
        switch (sw) {
            case StackA:
                for (int i = ptrA - 1; i >= 0; i--) {  // ptrA에서 부터 선형 검색
                    if (stk[i] == x)
                        return i;  // 검색 성공
                }
                break;
            case StackB:
                for (int i = ptrB + 1; i < max; i++) {  // ptrB에서 부터 선형 검색
                    if (stk[i] == x)
                        return i;  // 검색 성공
                }
                break;
        }
        return -1;  // 검색 실패
    }
    // 스택을 비움
    public void clear(AorB sw) {
        switch (sw) {
            case StackA:
                ptrA = 0;
                break;
            case StackB:
                ptrB = max - 1;
                break;
        }
    }
    // 스택의 용량을 반환
    public int capacity() {
        return max;
    }
    // 스택에 쌓여 있는 데이터의 수를 반환
    public int size(AorB sw) {
        switch (sw) {
            case StackA:
                return ptrA;
            case StackB:
                return max - ptrB - 1;
        }
        return 0;
    }
    // 스택이 비어 있는가?
    public boolean isEmpty(AorB sw) {
        switch (sw) {
            case StackA:
                return ptrA <= 0;
            case StackB:
                return ptrB >= max - 1;
        }
        return true;
    }
    // 스택이 가득 찼는가?
    public boolean isFull() {
        return ptrA >= ptrB + 1;
    }
    // 스택 안의 모든 데이터를 바닥 → 꼭대기 순서로 출력
    public void dump(AorB sw) {
        switch (sw) {
            case StackA:
                if (ptrA <= 0)
                    System.out.println("스택이 비었습니다.");
                else {
                    for (int i = 0; i < ptrA; i++)
                        System.out.print(stk[i] + " ");
                    System.out.println();
                }
                break;
            case StackB:
                if (ptrB >= max - 1)
                    System.out.println("스택이 비었습니다.");
                else {
                    for (int i = max - 1; i > ptrB; i--)
                        System.out.print(stk[i] + " ");
                    System.out.println();
                }
                break;
        }
    }
}
