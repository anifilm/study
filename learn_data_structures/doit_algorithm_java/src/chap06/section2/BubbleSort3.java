// 버블 정렬 (버전3)
package chap06.section2;
import java.util.Scanner;

public class BubbleSort3 {
    // 배열 요소 a[idx1]과 a[idx2]의 값을 바꿈
    static void swap(int[] a, int idx1, int idx2) {
        int tmp = a[idx1];
        a[idx1] = a[idx2];
        a[idx2] = tmp;
    }
    // 버블 정렬 (버전3, 이전 패스에서 교환이 없다면 교환 수행하지 않음)
    static void bubbleSort(int[] a, int n) {
    //  for (int i = 0; i < n - 1; i++)
        int i = 0;
        while (i < n - 1) {
            int last = n - 1;  // 마지막으로 요소를 교환한 위치
            for (int j = n - 1; j > i; j--) {
                if (a[j - 1] > a[j]) {
                    swap(a, j - 1, j);
                    last = j;  // 교환시점을 저장
                }
            }
            i = last;  // a[i]보다 앞쪽은 정렬을 마친 상태
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("버블 정렬 (버전3)");
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
