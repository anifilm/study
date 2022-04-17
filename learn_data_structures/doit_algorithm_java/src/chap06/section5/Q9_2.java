/* Q9
요소의 이동 횟수를 계산할 수 있도록 버전 1과 버전 2를 수정한 프로그램을 작성 하세요.
여러 가지 배열을 입력하고 프로그램을 실행하여 이동 횟수를 비교해 보세요.
*/
package chap06.section5;
import java.util.Scanner;

public class Q9_2 {
    // 셸 정렬
    static int shellSort(int[] a, int n) {
        int scnt = 0;  // 이동 횟수
        // h값이 배수가 되지 않도록 수정
        int h;
        for (h = 1; h < n / 9; h = h * 3 + 1)
            ;
        for ( ; h > 0; h /= 3) {
            // 2. 단순 삽입 정렬을 수행
            for (int i = h; i < n; i++) {
                int j;
                int tmp = a[i];
                for (j = i - h; j >= 0 && a[j] > tmp; j -= h) {
                    a[j + h] = a[j];
                    scnt++;
                }
                a[j + h] = tmp;
                scnt++;
            }
        }
        return scnt;
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("셸 정렬 (버전2)");
        System.out.print("요소수: ");
        int nx = stdIn.nextInt();
        int[] x = new int[nx];

        for (int i = 0; i < nx; i++) {
            System.out.print("x[" + i + "]: ");
            x[i] = stdIn.nextInt();
        }

        int cnt = shellSort(x, nx);  // 배열 x를 셸 정렬합니다.

        System.out.println("오름차순으로 정렬했습니다.");
        for (int i = 0; i < nx; i++)
            System.out.println("x[" + i + "] = " + x[i]);
        System.out.println("옮긴 횟수는 " + cnt + "회 입니다.");
    }
}
