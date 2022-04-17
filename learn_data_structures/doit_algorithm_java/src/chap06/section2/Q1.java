/* Q1
버블 정렬의 각 패스에서 비교, 교환은 처음(왼쪽)부터 수행해도 됩니다. (각 패스에서 가장 큰 값의 요소가 끝으로
옮겨집니다.) 그렇게 수정한 프로그램을 작성하세요.
 */
package chap06.section2;
import java.util.Scanner;

public class Q1 {
    // 배열 요소 a[idx1]과 a[idx2]의 값을 바꿈
    static void swap(int[] a, int idx1, int idx2) {
        int tmp = a[idx1];
        a[idx1] = a[idx2];
        a[idx2] = tmp;
    }
    // 버블 정렬 (버전1, 큰 값을 뒤으로 보낸다.)
    static void bubbleSort(int[] a, int n) {
        for (int i = 0; i < n - 1; i++) {
            for (int j = 0; j < n - 1 - i; j++) {
                if (a[j] > a[j + 1])
                    swap(a, j, j + 1);
            }
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("버블 정렬 (버전1, 큰 값을 뒤로)");
        System.out.print("요소수: ");
        int nx = stdIn.nextInt();
        int[] x = new int[nx];

        for (int i = 0; i < nx; i++) {
            System.out.print("x[" + i + "]: ");
            x[i] = stdIn.nextInt();
        }

        bubbleSort(x, nx);  // 배열 x를 버블 정렬합니다.

        System.out.println("오름차순으로 정렬했습니다.");
        for (int i = 0; i < nx; i++)
            System.out.println("x[" + i + "] = " + x[i]);
    }
}
