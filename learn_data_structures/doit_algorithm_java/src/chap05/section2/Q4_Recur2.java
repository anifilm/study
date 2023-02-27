/* Q4
아래의 recur2 메서드를 보고 하향식 분석과 상향식 분석을 수행해 보세요.
*/
package chap05.section2;
import java.util.Scanner;

public class Q4_Recur2 {
    static void recur(int n) {
        if (n > 0) {
            recur(n - 2);
            System.out.println(n);
            recur(n - 1);
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("정수를 입력하세요: ");
        int x = stdIn.nextInt();

        recur(x);

        stdIn.close();
    }
}
