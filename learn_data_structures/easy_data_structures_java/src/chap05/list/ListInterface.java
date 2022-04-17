package chap05.list;

public interface ListInterface<E> {
    public void add(int index, E x);
    public void append(E x);
    public E remove(int index);
    public boolean removeItem(E x);
    public E get(int index);
    public void set(int index, E x);
    public int indexOf(E x);
    public int len();
    public boolean isEmpty();
    public void clear();
} // 코드 5-4
  // index 인덱스
  // x     요소값
