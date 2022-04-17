/* Q17
오른쪽과 같이 아래를 향한 n단의 숫자 피라미드를 출력하는 함수를 작성하세요.
  static void nrpira(int n)

i행에 출력하는 숫자는 i % 10으로 구하세요.
*/
package chap01.section2;
import java.util.Scanner;

public class Q17 {
    static void nrpira(int n) {
        for (int i = 1; i <= n; i++) {
            for (int j = 0; j < n - i; j++)
                System.out.print(" ");
            for (int k = 0; k < i; k++)
                System.out.print(i);
            for (int l = 1; l < i; l++)
                System.out.print(i);
            System.out.println();
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("숫자 피라미드를 출력합니다.");
        int n;
        do {
            System.out.print("몇 단 입니까? ");
            n = stdIn.nextInt();
        } while (n <= 0);

        nrpira(n);
    }
}
