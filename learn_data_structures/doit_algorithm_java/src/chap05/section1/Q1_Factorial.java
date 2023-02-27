/* Q1
재귀 메서드 호출을 사용하지 않고 실습 5-1의 factorial 메서드를 작성하세요.
 */
package chap05.section1;
import java.util.Scanner;

public class Q1_Factorial {
    static int factorial(int n) {
        int result = 1;
        for (int i = 1; i <= n; i++) {
            result *= i;
        }
        return result;
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("정수를 입력하세요: ");
        int x = stdIn.nextInt();

        System.out.println(x + "의 팩토리얼은 " + factorial(x) + "입니다.");

        stdIn.close();
    }
}
