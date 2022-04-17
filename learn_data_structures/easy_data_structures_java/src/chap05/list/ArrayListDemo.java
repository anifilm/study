package chap05.list;

public class ArrayListDemo {
    public static void main(String[] args) {

        System.out.println("Array List Demo!");

        ArrayList<Integer> list = new ArrayList<>();

        list.add(0, 300); // 오토 박싱으로 300은 Integer(300)으로 취급해준다.
        list.add(0, 200);
        list.add(0, 100);
        list.printAll();

        list.append(500);
        list.append(600);
        list.printAll();

        list.remove(3);
        list.printAll();

        list.add(3, 250);
        list.add(1, 50);
        list.add(0, 10);
        list.append(700);
        list.printAll();

        list.remove(1);
        list.removeItem(600);
        list.printAll();
    }
} // 코드 5-6
