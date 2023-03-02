/* Q19
요소값의 범위가 min 이상 max 이하이고 요소의 개수가 n개인 배열 a를 도수 정렬하는 메서드를 작성하세요.
static void fSort(int[] a, int n, int min, int max)
*/
package chap06.section9;
import java.util.Scanner;

public class Q19_Fsort {
    // 도수 정렬 (배열 요소값 min 이상 max 이하)
    static void fSort(int[] a, int n, int min, int max) {
        int[] f = new int[max-min+2]; // 누적 도수
        int[] b = new int[n];         // 작업용 목적 배열

        for (int i = 0;   i < n;          i++) f[a[i]-min]++;           // 1단계
        for (int i = 1;   i <= max-min+1; i++) f[i] += f[i-1];          // 2단계
        for (int i = n-1; i >= 0;         i--) b[--f[a[i]-min]] = a[i]; // 3단계
        for (int i = 0;   i < n;          i++) a[i] = b[i];             // 4단계
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("도수 정렬");
        System.out.print("요소수: ");
        int nx = stdIn.nextInt();
        int[] x = new int[nx];

        for (int i = 0; i < nx; i++) {
            do {
                System.out.print("x[" + i + "]: ");
                x[i] = stdIn.nextInt();
            } while (x[i] < 0); // 양의 정수만 입력
        }

        // 배열 x의 최소값과 최대값을 구하여 min, max에 각각 대입합니다.
		int min = x[0];
        int max = x[0];
        for (int i = 1; i < nx; i++) {
            if (x[i] < min) min = x[i];
            if (x[i] > max) max = x[i];
        }

        fSort(x, nx, min, max); // 배열 x를 도수 정렬

        System.out.println("오름차순으로 정렬했습니다.");
        for (int i = 0; i < nx; i++) {
            System.out.println("x[" + i + "] = " + x[i]);
        }
    }
}
