package chap05.exercise;

public class Q2_ArrayList<E> implements Q2_ListInterface<E> {
    private E[] item;
    private int numItems;
    private static final int DEFAULT_CAPACITY = 64;

    public Q2_ArrayList() { // 생성자 1
        numItems = 0;
        item = (E[]) new Object[DEFAULT_CAPACITY];
    }

    public Q2_ArrayList(int n) { // 생성자 2
        numItems = 0;
        item = (E[]) new Object[n];
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

    // [Q2 다음 부분을 완성하시오.]
    public boolean contains(E x) {
        if (indexOf(x) > 0) {
            return true;
        }
        return false;
    }
}
