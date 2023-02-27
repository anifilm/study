// int형 큐의 사용 예
package chap04.section2;
import chap04.section1.IntStack;
import java.util.Scanner;

public class Q5_Tester {
    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        Q5_IntQueue s = new Q5_IntQueue(12);  // 최대 12개를 푸시할 수 있는 큐

        while (true) {
            System.out.println("현재 데이터 수: " + s.size() + " / " + s.capacity());
            System.out.print("(1)인큐 (2)디큐 (3)피크 (4)덤프 (5)indexOf (6)search (0)종료 >> ");
            int menu = stdIn.nextInt();

            int x;
            switch (menu) {
                case 1:  // 인큐
                    System.out.print("데이터: ");
                    x = stdIn.nextInt();
                    try {
                        s.enque(x);
                    }
                    catch (Q5_IntQueue.OverflowIntStackException e) {
                        System.out.println("큐가 가득 찼습니다.");
                    }
                    break;
                case 2:  // 디큐
                    try {
                        x = s.deque();
                        System.out.println("디큐한 데이터는 " + x + "입니다.");
                    }
                    catch (Q5_IntQueue.EmptyIntStackException e) {
                        System.out.println("큐가 비어 있습니다.");
                    }
                    break;
                case 3:  // 피크
                    try {
                        x = s.peek();
                        System.out.println("피크한 데이터는 " + x + "입니다.");
                    }
                    catch (Q5_IntQueue.EmptyIntStackException e) {
                        System.out.println("큐가 비어 있습니다.");
                    }
                    break;
                case 4:  // 덤프
                    s.dump();
                    break;
                case 5:  // indexOf
                    System.out.print("검색할 데이터: ");
                    x = stdIn.nextInt();
                    try {
                        int idx = s.indexOf(x);

                        if (idx < 0)
                            System.out.println("해당 데이터가 없습니다.");
                        else
                            System.out.println(x + "은(는) queue[" + idx + "]에 있습니다.");
                    }
                    catch (IntStack.EmptyIntStackException e) {
                        System.out.println("큐가 비어 있습니다.");
                    }
                    break;
                case 6:  // search
                    System.out.print("검색할 데이터: ");
                    x = stdIn.nextInt();
                    try {
                        int idx = s.search(x);

                        if (idx < 0)
                            System.out.println("해당 데이터가 없습니다.");
                        else
                            System.out.println(x + "은(는) front[" + idx + "]에 있습니다.");
                    }
                    catch (IntStack.EmptyIntStackException e) {
                        System.out.println("큐가 비어 있습니다.");
                    }
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
