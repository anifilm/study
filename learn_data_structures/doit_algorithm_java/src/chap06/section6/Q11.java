/* Q11
실습 6-10을 수정하여 푸시, 팝, 분할 과정을 출력하는 프로그램을 작성하세요.
 */
package chap06.section6;
import chap04.section1.IntStack;
import java.util.Scanner;

public class Q11 {
    // 배열 요소 a[idx1]과 a[idx2]의 값을 바꿈
    static void swap(int[] a, int idx1, int idx2) {
        int tmp = a[idx1];
        a[idx1] = a[idx2];
        a[idx2] = tmp;
    }
    // 퀵 정렬 (스택을 이용한 비재귀 버전)
    static void quickSort(int[] a, int left, int right) {
        IntStack lstack = new IntStack(right - left + 1);  // 스택 생성
        IntStack rstack = new IntStack(right - left + 1);  // 스택 생성

        lstack.push(left);
        rstack.push(right);

        System.out.printf("a[%d]~a[%d]를 분할하는 문제를 스택에 푸시합니다.\n", left, right);
        System.out.print("Lstack: ");
        lstack.dump();
        System.out.print("Rstack: ");
        rstack.dump();

        while (lstack.isEmpty() != true) {
            int pl = left = lstack.pop();   // 왼쪽 커서
            int pr = right = rstack.pop();  // 오른쪽 커서
            int x = a[(left + right) / 2];  // 피벗 (가운데 위치의 값)

            System.out.printf("스택에서 분할하는 문제를 꺼냈습니다. a[%d]~a[%d]를 분할합니다.\n", left, right);

            // 배열 a를 피벗 x를 기준으로 낮은 값 그룹과 높은 값 그룹으로 재정렬
            do {
                while (a[pl] < x) pl++;
                while (a[pr] > x) pr--;
                if (pl <= pr)
                    swap(a, pl++, pr--);
            } while (pl <= pr);

            if (left < pr) {
                lstack.push(left);  // 왼쪽 그룹 범위의
                rstack.push(pr);    // 인덱스를 푸시

                System.out.printf("a[%d]~a[%d]를 분할하는 문제를 스택에 푸시합니다.\n", left, pr);
                System.out.print("Lstack: ");
                lstack.dump();
                System.out.print("Rstack: ");
                rstack.dump();
            }
            if (pl < right) {
                lstack.push(pl);    // 오른쪽 그룹 범위의
                rstack.push(right); // 인덱스를 푸시

                System.out.printf("a[%d]~a[%d]를 분할하는 문제를 스택에 푸시합니다.\n", pl, right);
                System.out.print("Lstack: ");
                lstack.dump();
                System.out.print("Rstack: ");
                rstack.dump();
            }
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("퀵 정렬 (스택으로 구현)");
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
