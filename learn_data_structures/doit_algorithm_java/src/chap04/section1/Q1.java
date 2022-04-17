/* Q1
실습 4-2에서 사용하는 메서드는 size, capacity, push, pop, peek, dump뿐 입니다. 클래스 IntStack의 모든
메서드를 사용하는 프로그램을 작성하세요.
 */
package chap04.section1;
import java.util.Scanner;

public class Q1 {
    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        IntStack s = new IntStack(64);  // 최대 64개를 푸시할 수 있는 스택

        while (true) {
            System.out.println("현재 데이터 수: " + s.size() + " / " + s.capacity());
            System.out.print("(1)푸시 (2)팝 (3)피크 (4)덤프 (5)검색 (6)초기화 (0)종료 >> ");
            int menu = stdIn.nextInt();

            int x;
            switch (menu) {
                case 1:  // 푸시
                    System.out.print("데이터: ");
                    x = stdIn.nextInt();
                    try {
                        s.push(x);
                    }
                    catch (IntStack.OverflowIntStackException e) {
                        System.out.println("스택이 가득 찼습니다.");
                    }
                    break;
                case 2:  // 팝
                    try {
                        x = s.pop();
                        System.out.println("팝한 데이터는 " + x + "입니다.");
                    }
                    catch (IntStack.EmptyIntStackException e) {
                        System.out.println("스택이 비어 있습니다.");
                    }
                    break;
                case 3:  // 피크
                    try {
                        x = s.peek();
                        System.out.println("피크한 데이터는 " + x + "입니다.");
                    }
                    catch (IntStack.EmptyIntStackException e) {
                        System.out.println("스택이 비어 있습니다.");
                    }
                    break;
                case 4:  // 덤프
                    s.dump();
                    break;
                case 5:  // 검색
                    System.out.print("검색할 데이터: ");
                    x = stdIn.nextInt();
                    try {
                        int idx = s.indexOf(x);

                        if (idx < 0)
                            System.out.println("해당 데이터가 없습니다.");
                        else
                            System.out.println(x + "은(는) stack[" + idx + "]에 있습니다.");
                    }
                    catch (IntStack.EmptyIntStackException e) {
                        System.out.println("스택이 비어 있습니다.");
                    }
                    break;
                case 6:  // 초기화
                    if (!s.isEmpty()) {
                        System.out.println("스택을 비웁니다.");
                        s.clear();
                    } else
                        System.out.println("스택이 비어 있습니다.");
                    break;
                case 0:  // 종료
                    System.out.println("프로그램을 종료합니다.");
                    return;
                default:
                    System.out.println("잘못 입력하였습니다. 다시 선택하여 주십시오.");
            }
        }
    }
}
