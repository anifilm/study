package chap06.stack;

public class ArrayStack<E> implements StackInterface<E> {
    private E stack[];
    private int topIndex; // 스택의 탑 인덱스
    private static final int DEFAULT_CAPACITY = 64;
    private final E ERROR = null; // 임의의 에러 값

    public ArrayStack() { // 생성자 1
        stack = (E[]) new Object[DEFAULT_CAPACITY];
        topIndex = -1;
    }

    public ArrayStack(int n) { // 생성자 2
        stack = (E[]) new Object[n];
        topIndex = -1;
    }

    // [알고리즘 6-1] 구현: 스택에 요소 x 삽입하기
    public void push(E newItem) {
        if (isFull()) {
            /* 에러 처리 */
        } else {
            stack[++topIndex] = newItem;
        }
    }

    // [알고리즘 6-2] 구현: 스택에서 요소 삭제하기
    public E pop() {
        if (isEmpty()) {
            return ERROR;
        } else {
            return stack[topIndex--];
        }
    }

    // [알고리즘 6-3] 구현: 스택 탑 요소 알려주기
    public E top() {
        if (isEmpty()) {
            return ERROR;
        } else {
            return stack[topIndex];
        }
    }

    // [알고리즘 6-4] 구현: 스택이 꽉 찼는지 확인하기
    public boolean isFull() {
        return (topIndex == stack.length - 1);
    }

    // [알고리즘 6-5] 구현: 스택이 비었는지 확인하기
    public boolean isEmpty() {
        return (topIndex < 0);
    }

    // [알고리즘 6-6] 구현: 스택 비우기
    public void popAll() {
        stack = (E[]) new Object[stack.length];
        topIndex = -1;
    }

    ////////////////////////////////////////////
    public void printAll() {
        System.out.print("Stack from top: ");
        for(int i = topIndex; i >= 0; i--) {
            System.out.print(stack[i] + " ");
        }
        System.out.println();
    }

    public int getTopIndex() {
        return topIndex;
    }
} // 코드 6-2
