package chap05.list;

public class ArrayList<E> implements ListInterface<E>{
    private E[] item;
    private int numItems;
    private static final int DEFAULT_CAPACITY = 64;

    public ArrayList() { // 생성자 1
        numItems = 0;
        item = (E[]) new Object[DEFAULT_CAPACITY];
    }

    public ArrayList(int n) { // 생성자 2
        numItems = 0;
        item = (E[]) new Object[n];
    }

    // [알고리즘 5-1] 구현: 배열 리스트의 k번째 자리에 요소 x 삽입하기
    public void add(int index, E x) {
        if (numItems >= item.length || index < 0 || index > numItems) {
            /* 에러 처리 */
        } else {
            for (int i = numItems - 1; i >= index; i--) {
                item[i + 1] = item[i]; // 우 시프트
            }
            item[index] = x;
            numItems++;
        }
    }

    // [알고리즘 5-2] 구현: 배열 리스트의 맨 뒤에 요소 x 추가하기
    public void append(E x) {
        if (numItems >= item.length) {
            /* 에러 처리 */
        } else {
            item[numItems++] = x;
        }
    }

    // [알고리즘 5-3] 구현: 배열 리스트의 k번째 요소 삭제하기
    public E remove(int index) {
        if (isEmpty() || index < 0 || index > numItems - 1) {
            return null;
        } else {
            E tmp = item[index];
            for (int i = index; i <= numItems - 2; i++) {
                item[i] = item[i + 1]; // 좌 시프트
            }
            numItems--;
            return tmp;
        }
    }

    // [알고리즘 5-4] 구현: 배열 리스트에서 요소 x 삭제하기
    public boolean removeItem(E x) {
        int k = 0;
        while (k < numItems && ((Comparable)item[k]).compareTo(x) != 0) {
            k++;
        }
        if (k == numItems) {
            return false;
        } else {
            for (int i = k; i <= numItems - 2; i++) {
                item[i] = item[i + 1]; // 좌 시프티
            }
            numItems--;
            return true;
        }
    }

    // [알고리즘 5-5] 구현: 배열 리스트의 i번째 요소 알려주기
    public E get(int index) { // 첫번째 요소를 0번째 요소로 표기
        if (index >= 0 && index <= numItems - 1) {
            return item[index];
        } else {
            return null;
        }
    }

    // [알고리즘 5-6] 구현: 배열 리스트의 i번재 요소를 x로 대체하기
    public void set(int index, E x) {
        if (index >= 0 && index <= numItems - 1) {
            item[index] = x;
        } else {
            /* 에러 처리 */
        }
    }

    // [알고리즘 5-7] 구현: 원소 x가 배열 리스트의 몇 번째 원소인지 알려주기
    private final int NOT_FOUND = -12345;
    public int indexOf(E x) {
        int i = 0;
        for (i = 0; i < numItems; i++) {
            if (((Comparable)item[i]).compareTo(x) == 0)
                return i;
        }
        return NOT_FOUND; // not exist
    }

    // [알고리즘 5-8(1)] 구현: 배열 리스트의 총 요소수 알려주기
    public int len() {
        return numItems;
    }

    // [알고리즘 5-8(2)] 구현: 배열 리스트가 비었는지 알려주기
    public boolean isEmpty() {
        return numItems == 0;
    }

    // [알고리즘 5-8(3)] 구현: 배열 리스트 깨끗이 청소하기
    public void clear() {
        numItems = 0;
        item = (E[]) new Object[item.length];
    }

    ///////////////////////////////////////////////////////////////////////
    public void printAll() {
        System.out.print("Print list (#items=" + numItems + ") ");
        for (int i = 0; i < numItems; i++) {
            System.out.print(item[i] + " ");
        }
        System.out.println();
    }
} // 코드 5-5
