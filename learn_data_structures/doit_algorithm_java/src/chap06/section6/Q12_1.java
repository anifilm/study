/* Q12
실습 6-9, 6-10의 quickSort 메서드를 요소의 개수가 적은 그룹을 먼저 나누는 매서드로 수정하세요.
 */
package chap06.section6;
import java.util.Scanner;

public class Q12_1 {
    // 배열 요소 a[idx1]과 a[idx2]의 값을 바꿈
    static void swap(int[] a, int idx1, int idx2) {
        int tmp = a[idx1];
        a[idx1] = a[idx2];
        a[idx2] = tmp;
    }
    // 퀵 정렬
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

        // 요소의 개수가 많은 그룹을 먼저 푸시 하도록 swap
        if (pr - left < right - pl) {
            int tmp;
            tmp = left;
            left = pl;
            pl = tmp;
            tmp = right;
            right = pr;
            pr = tmp;
        }

        // 재귀 호출을 통한 정렬 실행
        if (left < pr)
            quickSort(a, left, pr);
        if (pl < right)
            quickSort(a, pl, right);
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

        quickSort(x, 0, nx - 1);  // 배열 x를 퀵 정렬

        System.out.println("오름차순으로 정렬했습니다.");
        for (int i = 0; i < nx; i++)
            System.out.println("x[" + i + "] = " + x[i]);
    }
}
