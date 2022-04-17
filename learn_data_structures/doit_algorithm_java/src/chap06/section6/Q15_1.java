/* Q15
피벗 선택하기의 방법 2을 사용하여 연습문제 Q13의 quickSort 메서드(재귀, 비재귀 버전)를 수정하세요.
방법 2. 나눌 배열의 처음, 가운데, 끝 요소를 정렬한 다음 가운데 요소와 끝에서 두번째 요소를 교환합니다.
       피벗으로 끝에서 두 번째 요소의 값(a[right - 1])을 선택하여 나눌 대상의 범위를 a[left + 1] ~
       a[right - 2]로 좁힙니다.
*/
package chap06.section6;
import java.util.Scanner;

public class Q15_1 {
    // 배열 요소 a[idx1]과 a[idx2]의 값을 바꿈
    static void swap(int[] a, int idx1, int idx2) {
        int tmp = a[idx1];
        a[idx1] = a[idx2];
        a[idx2] = tmp;
    }
    // x[a], x[b], x[c]를 sort (중앙값의 index를 반환)
    static int sort3Elem(int[] x, int a, int b, int c) {
        if (x[b] < x[a])
            swap(x, b, a);
        if (x[c] < x[b])
            swap(x, c, b);
        if (x[b] < x[a])
            swap(x, b, a);
        return b;
    }
    // 단순 삽입 정렬
    static void insertionSort(int[] a, int left, int right) {
        for (int i = left + 1; i <= right; i++) {
            int tmp = a[i];
            int j;
            for (j = i; j > left && a[j - 1] > tmp; j--)
                a[j] = a[j - 1];
            a[j] = tmp;
        }
    }
    // 퀵 정렬
    static void quickSort(int[] a, int left, int right) {
        if (right - left < 9)  // 그룹의 요소 개수가 9개 이하이면 단순 삽입 정렬
            insertionSort(a, left, right);
        else {
            int pl = left;   // 왼쪽 커서
            int pr = right;  // 오른쪽 커서

            int x;  // 피벗, 방법 2
            int m = sort3Elem(a, pl, (pl + pr) / 2, pr);
            x = a[m];
            swap(a, m, right - 1);
            pl++;
            pr--;

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
