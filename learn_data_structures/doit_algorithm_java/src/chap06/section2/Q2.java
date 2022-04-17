/* Q2
오른쪽처럼 비교, 교환 과정을 자세히 출력하면서 버블 정렬하는 프로그램을 작성하세요. 비교하는 두 요소 사이에
교환을 수행하면 '+', 수행하지 않으면 '-'를 출력하고 정렬을 마치면 비교 횟수와 교환 횟수를 출력하세요.
  패스 1:
  6 4 3 7 1 9+8
  6 4 3 7 1-8 9
  6 4 3 7+1 8 9
  6 4 3+1 7-8 9
  6 4+1 3 7 8 9
  6+1 4 3 7 8 9
  1 6 4 3 7 8 9
  패스 2:
  1 6 4 3 7-8-9
  ...중략...
  비교를 21회 했습니다.
  교환을 8회 했습니다.
*/
package chap06.section2;
import java.util.Scanner;

public class Q2 {
    // 배열 요소 a[idx1]과 a[idx2]의 값을 바꿈
    static void swap(int[] a, int idx1, int idx2) {
        int tmp = a[idx1];
        a[idx1] = a[idx2];
        a[idx2] = tmp;
    }
    // 버블 정렬 (버전1, 과정 출력)
    static void bubbleSort(int[] a, int n) {
        int ccnt = 0;  // 비교 횟수
        int scnt = 0;  // 교환 횟수

        for (int i = 0; i < n - 1; i++) {
            System.out.println("패스 " + (i + 1) + ":");

            for (int j = n - 1; j > i; j--) {
                for (int k = 0; k < j - 1; k++)
                    System.out.print(a[k] + " ");
                if (a[j - 1] > a[j]) {
                    System.out.print(a[j - 1] + "+" + a[j] + " ");
                    swap(a, j - 1, j);
                    scnt++;
                }
                else
                    System.out.print(a[j - 1] + "-" + a[j] + " ");
                for (int k = j + 1; k < n; k++)
                    System.out.print(a[k] + " ");
                System.out.println();
                ccnt++;
            }
        }

        System.out.println("비교를 " + ccnt + "회 했습니다.");
        System.out.println("교환을 " + scnt + "회 했습니다.");
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("버블 정렬 (버전1, 과정 출력)");
        System.out.print("요소수: ");
        int nx = stdIn.nextInt();
        int[] x = new int[nx];

        for (int i = 0; i < nx; i++) {
            System.out.print("x[" + i + "]: ");
            x[i] = stdIn.nextInt();
        }

        bubbleSort(x, nx);  // 배열 x를 버블 정렬합니다.
    }
}
