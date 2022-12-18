package chap03.template.method;

public class CharDisplay extends AbstractDisplay { // CharDisplay는 AbstractDisplay의 하위 클래스
    private char ch; // 표시해야할 문자

    public CharDisplay(char ch) { // 생성자에서 전달된 문자 ch를 필드에 기억해 둔다.
        this.ch = ch;
    }

    public void open() { // 상위 클래스에서는 추상 메서드였다. 여기에서 오버라이드해서 구현
        System.out.print("<<"); // 개시 문자열 "<<" 을 표시
    }

    public void print() { // print 메서드도 여기에서 구현. 이것이 display에서 반복 호출
        System.out.print(ch); // 필드에 기억해 둔 문자를 1개 표시
    }

    public void close() { // close 메서드로 여기에서 구현
        System.out.println(">>"); // 종료 문자열 ">>" 을 표시
    }
}
