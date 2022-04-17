/* Q10
아래 형식으로 동작하는 quickSort 메서드를 구현하세요. 두번째 매개변수인 n은 요소의 개수 입니다.
  void quick_sort(int a[], int n);

*/
package chap06.section6;
import java.util.Scanner;

public class Q10 {
    // 배열 요소 a[idx1]과 a[idx2]의 값을 바꿈
    static void swap(int[] a, int idx1, int idx2) {
        int tmp = a[idx1];
        a[idx1] = a[idx2];
        a[idx2] = tmp;
    }
    // 퀵 정렬 (left, right -> 머리 & 꼬리 요소의 index)
    static void quickSort(int[] a, int left, int right) {
        int pl = left;   // 왼쪽 커서
        int pr = right;  // 오른쪽 커서
        int x = a[(pl + pr) / 2];  // 피벗 (가운데 위치의 값)

        // 배열 a를 피벗 x를 기준으로 낮은 값 그룹과 높은 값 그룹으로 재정렬
        do {
            while (a[pl] < x) pl++;
            while (a[pr] > x) pr--;
            if (pl <= pr)
                swap(a, pl++, pr--);
        } while (pl <= pr);

        // 재귀 호출을 통한 정렬 실행
        if (left < pr)
            quickSort(a, left, pr);
        if (pl < right)
            quickSort(a, pl, right);
    }

    // 퀵 정렬 (n … 요소수)
    static void quickSort(int[] a, int n) {
        quickSort(a, 0, n - 1);
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("퀵 정렬");
        System.out.print("요소수: ");
        int nx = stdIn.nextInt();
        int[] x = new int[nx];

        for (int i = 0; i < nx; i++) {
            System.out.print("x[" + i + "]: ");
            x[i] = stdIn.nextInt();
        }

        quickSort(x, nx);  // 배열 x를 퀵 정렬

        System.out.println("오름차순으로 정렬했습니다.");
        for (int i = 0; i < nx; i++)
            System.out.println("x[" + i + "] = " + x[i]);
    }
}
