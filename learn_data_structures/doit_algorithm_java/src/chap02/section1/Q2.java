/* Q2
오른쪽처럼 배열 요소를 역순으로 정렬하는 과정을 하나하나 나타내는 프로그램을 작성하세요.
*/
package chap02.section1;
import java.util.Scanner;

public class Q2 {
    // 배열 요소 a[idx1]과 a[idx2]의 값을 바꿈
    static void swap(int[] a, int idx1, int idx2) {
        System.out.println("a[" + idx1 + "]과(와) a[" + idx2 + "]를 교환합니다.");
        int tmp = a[idx1];
        a[idx1] = a[idx2];
        a[idx2] = tmp;
    }
    // 배열 a의 요소를 출력
    static void print(int[] a) {
        for (int i = 0; i < a.length; i++)
            System.out.print(a[i] + " ");
        System.out.println();
    }
    // 배열 a의 요소를 역순으로 정렬
    static void reverse(int[] a) {
        for (int i = 0; i < a.length / 2; i++) {
            print(a);
            swap(a, i, a.length - 1 - i);
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("요소수: ");
        int num = stdIn.nextInt();  // 요소수

        int[] x = new int[num];  // 요소수가 num인 배열

        for (int i = 0; i < num; i++) {
            System.out.print("x[" + i + "]: ");
            x[i] = stdIn.nextInt();
        }

        reverse(x);  // 배열 a의 요소를 역순으로 정렬
        print(x);
        System.out.println("역순 정렬을 마쳤습니다.");
    }
}
