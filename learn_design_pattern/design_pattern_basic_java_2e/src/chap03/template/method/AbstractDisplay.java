package chap03.template.method;

public abstract class AbstractDisplay { // 추상 클래스 AbstractDisplay
    public abstract void open(); // 하위 클래스에 구현을 맡기는 추상 메서드(1) open

    public abstract void print(); // 하위 클래스에 구현을 맡기는 추상 메서드(2) print

    public abstract void close(); // 하위 클래스에 구현을 맡기는 추상 메서드(3) close

    public final void display() { // 추상클래스에서 구현되고 있는 메서드 display
        open(); // 우선 open 하고...
        for (int i = 0; i < 5; i++) { // 5번 print를 반복
            print();
        }
        close(); // 마지막으로 close 한다. 이것이 display 메서드에서 구현되고 있는 내용
    }
}
