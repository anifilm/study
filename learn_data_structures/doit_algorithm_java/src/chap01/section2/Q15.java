/* Q15
직각 이등변 삼각형을 출력하는 부분을 아래와 같은 형식의 함수로 작성하세요.
  static void triangleLB(int n)  // 왼쪽 아래가 직각인 이등변 삼각형을 출력

또 왼쪽 위, 오른쪽 위, 오른쪽 아래가 직각인 이등변 삼각형을 출력하는 함수를 작성하세요.
  static void triangleLU(int n)  // 왼쪽 위가 직각인 이등변 삼각형을 출력
  static void triangleRU(int n)  // 오른쪽 위가 직각인 이등변 삼각형을 출력
  static void triangleRB(int n)  // 오른쪽 아래가 직각인 이등변 삼각형을 출력
*/
package chap01.section2;
import java.util.Scanner;

public class Q15 {
    static void triangleLB(int n) {  // 왼쪽 아래가 직각인 이등변 삼각형을 출력
        for (int i = 0; i < n; i++) {
            for (int j = 0; j < 1 + i; j++)
                System.out.print("*");
            System.out.println();
        }
    }
    static void triangleLU(int n) {  // 왼쪽 위가 직각인 이등변 삼각형을 출력
        for (int i = 0; i < n; i++) {
            for (int j = 0; j < n - i; j++)
                System.out.print("*");
            System.out.println();
        }
    }
    static void triangleRU(int n) {  // 오른쪽 위가 직각인 이등변 삼각형을 출력
        for (int i = 0; i < n; i++) {
            for (int j = 0; j < i; j++)
                System.out.print(" ");
            for (int k = 0; k < n - i; k++)
                System.out.print("*");
            System.out.println();
        }
    }
    static void triangleRB(int n) {  // 오른쪽 아래가 직각인 이등변 삼각형을 출력
        for (int i = 0; i < n; i++) {
            for (int j = 0; j < n - 1 - i; j++)
                System.out.print(" ");
            for (int k = 0; k < 1 + i; k++)
                System.out.print("*");
            System.out.println();
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("직각인 이등변 삼각형을 출력합니다.");
        int n;
        do {
            System.out.print("몇 단 삼각형입니까? ");
            n = stdIn.nextInt();
        } while (n <= 0);

        // 왼쪽 아래가 직각인 이등변 삼각형을 출력
        triangleLB(n);
        System.out.println();

        // 왼쪽 위가 직각인 이등변 삼각형을 출력
        triangleLU(n);
        System.out.println();

        // 오른쪽 위가 직각인 이등변 삼각형을 출력
        triangleRU(n);
        System.out.println();

        // 오른쪽 아래가 직각인 이등변 삼각형을 출력
        triangleRB(n);
        System.out.println();
    }
}
