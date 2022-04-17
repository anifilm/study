/* Q5
중앙값을 구하는 메서드는 다음과 같이 작성할 수도 있습니다. 그러나 실습 1C-1의
med3 메서드에 비해 효율이 떨어지는데, 그 이유를 설명하세요.
 */
package chap01.section1;
import java.util.Scanner;

public class Q5 {
    static int med3(int a, int b, int c) {
        if ((b >= a && c <= a) || (b <= a && c >= a))
            return a;
        else if ((a > b && c < b) || (a < b && c > b))
            return b;
        return c;
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

