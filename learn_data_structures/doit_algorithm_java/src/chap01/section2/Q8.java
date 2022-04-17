/* Q8
1부터 10까지의 합은 (1 + 10) * 5와 같은 방법으로 구할 수 있습니다.
가우스 덧셈이라는 이 방법을 이용하여 1부터 n까지의 정수 합을 구하는 프로그램을 작성하세요.
 */
package chap01.section2;
import java.util.Scanner;

public class Q8 {
    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("1부터 n까지의 합을 구합니다.");
        System.out.print("n의 값: ");
        int n = stdIn.nextInt();

        int sum = 0;    // 합
        sum = (1 + n) * n / 2;
        System.out.println("1부터 " + n + "까지의 합은 " + sum + "입니다.");

        sum = 0;
        for (int i = 1; i <= n; i++)
            sum += i;
        System.out.println("계산 검증: " + sum);
    }
}
