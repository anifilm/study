package chap05.exercise;

import chap05.list.LinkedList;

public class Q2_ArrayList<E> extends LinkedList<E> implements Q2_ListInterface<E> {
    public Q2_ArrayList() {
        super();
    }

    // [Q2 다음 부분을 완성하시오.]
    public boolean contains(E x) {
        if (indexOf(x) > 0) {
            return true;
        }
        return false;
    }
}
