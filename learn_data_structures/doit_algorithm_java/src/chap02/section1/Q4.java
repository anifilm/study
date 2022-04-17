/* Q4
배열 b의 모든 요소를 배열 a에 복사하는 메서드 copy를 작성하세요.
  static void copy(int[] a, int[] b)
*/
package chap02.section1;
import java.util.Scanner;

public class Q4 {
    // 배열 b의 모든 요소를 배열 a에 복사
    static void copy(int[] a, int[] b) {
        for (int i = 0; i < b.length; i++) {
            a[i] = b[i];
        }
    }
    // 배열 a의 요소를 출력
    static void print(int[] a) {
        for (int i = 0; i < a.length; i++)
            System.out.println("a[" + i + "]: " + a[i]);
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("배열의 요소수: ");
        int n = stdIn.nextInt();  // 배열 a와 b의 요소수

        int[] a = new int[n];  // 요소수가 na인 배열
        int[] b = new int[n];  // 요소수가 nb인 배열

        for (int i = 0; i < n; i++) {
            System.out.print("b[" + i + "]: ");
            b[i] = stdIn.nextInt();
        }

        // 배열 b의 모든 요소를 배열 a에 복사
        copy(a, b);
        System.out.println("배열 b의 모든 요소를 배열 a에 복사했습니다.");
        // 배열 a의 요소를 출력
        print(a);
    }
}
