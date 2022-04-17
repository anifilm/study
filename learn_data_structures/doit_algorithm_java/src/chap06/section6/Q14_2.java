/* Q14
피벗 선택하기의 방법 1을 사용하여 연습문제 Q13의 quickSort 메서드(재귀, 비재귀 버전)를 수정하세요.
방법 1. 나눌 배열의 요소 개수가 3 이상이면 임의로 요소 3을 선택하고 그 중에서 중앙값인 요소를 피벗
       으로 선택합니다.
*/
package chap06.section6;
import chap04.section1.IntStack;
import java.util.Scanner;

public class Q14_2 {
    // a, b, c의 중앙값을 구하여 반환
    static int med3(int a, int b, int c) {
        if (a >= b)
            if (b >= c)
                return b;
            else if (a <= c)
                return a;
            else
                return c;
        else if (a > c)
            return a;
        else if (b > c)
            return c;
        else
            return b;
    }
    // 배열 요소 a[idx1]과 a[idx2]의 값을 바꿈
    static void swap(int[] a, int idx1, int idx2) {
        int tmp = a[idx1];
        a[idx1] = a[idx2];
        a[idx2] = tmp;
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
    // 퀵 정렬 (스택을 이용한 비재귀 버전)
    static void quickSort(int[] a, int left, int right) {
        IntStack lstack = new IntStack(right - left + 1);  // 스택 생성
        IntStack rstack = new IntStack(right - left + 1);  // 스택 생성

        lstack.push(left);
        rstack.push(right);

        while (lstack.isEmpty() != true) {
            int pl = left = lstack.pop();   // 왼쪽 커서
            int pr = right = rstack.pop();  // 오른쪽 커서

            if (right - left < 9)  // 그룹의 요소 개수가 9개 이하이면 단순 삽입 정렬
                insertionSort(a, left, right);
            else {
                int x = med3(a[pl], a[(pl + pr) / 2], a[pr]);  // 방법 1

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

                if (left < pr) {
                    lstack.push(left);  // 왼쪽 그룹 범위의
                    rstack.push(pr);    // 인덱스를 푸시
                }
                if (pl < right) {
                    lstack.push(pl);    // 오른쪽 그룹 범위의
                    rstack.push(right); // 인덱스를 푸시
                }
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
