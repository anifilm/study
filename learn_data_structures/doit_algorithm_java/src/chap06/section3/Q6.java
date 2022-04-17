/* Q6
요소의 교환 과정을 자세하게 출력할 수 있도록 단순 선택 정렬 프로그램을 수정 하세요. 오른쪽처럼
정렬하지 않은 부분의 첫번째 요소 위에는 기호 *를, 정렬하지 않은 부분의 가장 작은 값의 요소 위
에는 기호 +를 출력 하세요.
이 문제는 6-3절의 '단순 선택 정렬' 프로그램을 개선하는 연습문제 입니다.
  *       +
  6 4 8 3 1 9 7
    *   +
  1 4 8 3 6 9 7
      * +
  1 3 8 4 6 9 7
  ...이하 생략...
*/
package chap06.section3;
import java.util.Scanner;

public class Q6 {
    // 배열 요소 a[idx1]과 a[idx2]의 값을 바꿈
    static void swap(int[] a, int idx1, int idx2) {
        int tmp = a[idx1];
        a[idx1] = a[idx2];
        a[idx2] = tmp;
    }
    // 단순 선택 정렬
    static void selectionSort(int[] a, int n) {
        for (int i = 0; i < n - 1; i++) {
            int min = i;  // 아직 정렬되지 않은 부분에서 가장 작은 요소의 인덱스를 기록
            for (int j = i + 1; j < n; j++) {
                if (a[j] < a[min])
                    min = j;
            }
            // 교환 과정 출력
            for (int k = 0; k < n; k++) {
                if (k == i)
                    System.out.print("* ");
                else if (k == min)
                    System.out.print("+ ");
                else
                    System.out.print("  ");
            }
            System.out.println();
            for (int k = 0; k < n; k++)
                System.out.print(a[k] + " ");
            System.out.println();

            swap(a, i, min);  // 아직 정렬되지 않은 부분의 첫 요소와 가장 작은 요소를 교환
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("단순 선택 정렬");
        System.out.print("요소수: ");
        int nx = stdIn.nextInt();
        int[] x = new int[nx];

        for (int i = 0; i < nx; i++) {
            System.out.print("x[" + i + "]: ");
            x[i] = stdIn.nextInt();
        }

        selectionSort(x, nx);  // 배열 x를 단순 선택 정렬합니다.

        System.out.println("오름차순으로 정렬했습니다.");
        for (int i = 0; i < nx; i++)
            System.out.println("x[" + i + "] = " + x[i]);
    }
}
