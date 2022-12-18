package chap03.template.method;

public class StringDisplay extends AbstractDisplay { // StringDisplay도 AbstractDisplay의 하위 클래스
    private String string; // 표시해야 할 문자열
    private int width; // 바이트 단위로 계산한 문자열의 길이

    public StringDisplay(String string) {
        this.string = string; // 생성자에서 전달된 문자열 string을 필드에 기억
        this.width = string.getBytes().length; // 그리고 바이트 단위의 길이도 필드에 기억에 두고 나중에 사용
    }

    public void open() { // 오버라이드해서 정의한 open 메서드
        printLine(); // 이 클래스의 메서드 printLine에서 선을 그리고 있다.
    }

    public void print() { // print 메서드는 필드에 기억해둔 문자열의 전후에 "|"을 붙여서 표시
        System.out.println("|" + string + "|");
    }

    public void close() { // close 메서드는 open처럼 printLine 메서드에서 선을 그리고 있다.
        printLine();
    }

    private void printLine() { // open과 close에서 호출된 printLine 메서드. private이기 때문에 이 클래스 안에서만 사용된다.
        System.out.print("+"); // 테두리의 모서리를 표현하는 "+"를 표시
        for (int i = 0; i < width; i++) { // width개의 "-"으로 테두리 선을 표시
            System.out.print("-");
        }
        System.out.println("+"); // 테두리의 모서리를 표현하는 "+"를 표시
    }
}
