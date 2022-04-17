/* Q4
세값의 대소 관계 13종류의 모든 조합에 대해 중앙값을 구하여 출력하는 프로그램을 작성하세요.
 */
package chap01.section1;
import java.util.Scanner;

public class Q4 {
    static int med3(int a, int b, int c) {
        if (a >= b)
            if (b >= c)
                return b;
            else if (a <= c)
                return a;
            else
                return c;
        else if (a > c)
            return a;
        else if (b > c)
            return c;
        else
            return b;
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("세 정수의 중앙값을 구합니다.");
        System.out.print("a의 값: ");
        int a = stdIn.nextInt();
        System.out.print("b의 값: ");
        int b = stdIn.nextInt();
        System.out.print("c의 값: ");
        int c = stdIn.nextInt();

        System.out.println("중앙값은 " + med3(a, b, c) + " 입니다.");
    }
}

