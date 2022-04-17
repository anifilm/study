/* Q16
n단의 피라미드를 출력하는 함수를 작성하시오 (오른쪽은 4단의 예)
  static void spira(int n)

i행에는 (i - 1) * 2 + 1개의 기호 문자 *를 출력하시오
(마지막 n 행은 (n - 1) * 2 + 1)개의 기호문자 *를 출력하게 됩니다.
*/
package chap01.section2;
import java.util.Scanner;

public class Q16 {
    static void spira(int n) {
        for (int i = 0; i < n; i++) {
            for (int j = 0; j < n - 1 - i; j++)
                System.out.print(" ");
            for (int k = 0; k < 1 + i * 2; k++)
                System.out.print("*");
            System.out.println();
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("피라미드를 출력합니다.");
        int n;
        do {
            System.out.print("몇 단 입니까? ");
            n = stdIn.nextInt();
        } while (n <= 0);

        spira(n);
    }
}
