/* Q3
배열 a의 모든 요소의 합계를 구하여 반환하는 메서드를 작성하세요.
  static int sumOf(int[] a)
*/
package chap02.section1;
import java.util.Scanner;

public class Q3 {
    // 배열 a의 요소의 합계를 반환
    static int sumOf(int[] a) {
        int sum = 0;
        for (int i = 0; i < a.length; i++)
            sum += a[i];
        return sum;
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("요소수: ");
        int num = stdIn.nextInt();  // 요소수

        int[] x = new int[num];  // 요소수가 num인 배열

        for (int i = 0; i < num; i++) {
            System.out.print("x[" + i + "]: ");
            x[i] = stdIn.nextInt();
        }

        int sum = sumOf(x);
        System.out.println("배열 요소의 합은 " + sum);
    }
}
