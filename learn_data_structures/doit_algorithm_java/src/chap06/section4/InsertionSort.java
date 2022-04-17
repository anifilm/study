// 단순 삽입 정렬
package chap06.section4;
import java.util.Scanner;

public class InsertionSort {
    // 단순 삽입 정렬
    static void insertionSort(int[] a, int n) {
        for (int i = 1; i < n; i++) {
            int j;
            int tmp = a[i];  // 두 번째 요소부터 임시로 저장하여 진행

            // 1. 정렬된 열의 왼쪽 끝에 도달하거나 (j가 0보다 크다)
            // 2. tmp보다 작거나 같은 key를 갖는 항목 a[j]를 찾을때 까지 (a[j-1]값이 tmp보다 크다)
            for (j = i; j > 0 && a[j - 1] > tmp; j--)  // 역순으로 진행하며
                a[j] = a[j - 1];  // 앞의 인덱스의 요소를 한칸씩 뒤로 이동시킴
            a[j] = tmp;  // 빈자리에 임시 저장한 요소를 삽입하여 정렬
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("단순 삽입 정렬");
        System.out.print("요소수: ");
        int nx = stdIn.nextInt();
        int[] x = new int[nx];

        for (int i = 0; i < nx; i++) {
            System.out.print("x[" + i + "]: ");
            x[i] = stdIn.nextInt();
        }

        insertionSort(x, nx);  // 배열 x를 단순 삽입 정렬합니다.

        System.out.println("오름차순으로 정렬했습니다.");
        for (int i = 0; i < nx; i++)
            System.out.println("x[" + i + "] = " + x[i]);
    }
}
