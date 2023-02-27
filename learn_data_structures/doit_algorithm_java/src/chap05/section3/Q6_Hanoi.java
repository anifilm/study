/* Q6
실습 5-6을 숫자가 아닌 문자열로 기둥 이름을 출력하도록 프로그램을 수정하세요. 예를 들어 'A 기둥', 'B 기둥', 'C 기둥'과 같이 출력하면 됩니다.
*/
package chap05.section3;
import java.util.Scanner;

public class Q6_Hanoi {
    static String[] name = { "A 기둥", "B 기둥", "C 기둥" };

    static void move(int no, int x, int y) {
        if (no > 1) {
            move(no - 1, x, 6 - x - y);
        }
        System.out.println("원반[" + no + "]을 " + name[x-1] + "기둥에서 " + name[y-1] + "기둥으로 옮김");
        if (no > 1) {
            move(no - 1, 6 - x - y, y);
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("하노이의 탑");
        System.out.print("원반 개수: ");
        int n = stdIn.nextInt();

        move(n, 1, 3);

        stdIn.close();
    }
}
