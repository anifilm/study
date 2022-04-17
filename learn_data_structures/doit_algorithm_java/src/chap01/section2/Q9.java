/* Q9
정수 a, b를 포함하여 그 사이의 모든 정수의 합을 구하는 아래 함수를 작성하세요.
  static int sumof(int a, int b)
 */
package chap01.section2;
import java.util.Scanner;

public class Q9 {
    static int sumof(int a, int b) {
        int sum = 0;
        if (a < b) {
            for (int i = a; i <= b; i++)
                sum += i;
        }
        else {
            for (int i = b; i <= a; i++)
                sum += i;
        }
        return sum;
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("a부터 b까지의 합을 구합니다.");
        System.out.print("a의 값: ");
        int a = stdIn.nextInt();
        System.out.print("b의 값: ");
        int b = stdIn.nextInt();

        int sum = sumof(a, b);    // 합
        System.out.println(a + "부터 " + b + "까지의 합은 " + sum + "입니다.");
    }
}
