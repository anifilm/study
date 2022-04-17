/* Q7
단순 삽입 정렬에서 배열의 첫 번째 요소(a[0])부터 데이터를 저장하지 않고 a[1]부터 데이터를 저장하면
a[0]을 보초로 하여 삽입을 마치는 조건을 줄일 수 있습니다. 이 아이디어를 적용한 단순 삽입 정렬 메서드를
수정하세요.
 */
package chap06.section4;
import java.util.Scanner;

public class Q7 {
    // 단순 삽입 정렬 (a[0]을 보초로 사용)
    static void insertionSort(int[] a, int n) {
        for (int i = 2; i < n; i++) {
            int tmp = a[0] = a[i];  // 두 번째 요소부터 임시로 저장하여 진행
            int j = i;

            // 1. 정렬된 열의 왼쪽 끝에 도달하거나 (j가 0보다 크다)
            // 2. tmp보다 작거나 같은 key를 갖는 항목 a[j]를 찾을때 까지 (a[j-1]값이 tmp보다 크다)
            for ( ; a[j - 1] > tmp; j--)  // 역순으로 진행하며
                a[j] = a[j - 1];  // 앞의 인덱스의 요소를 한칸씩 뒤로 이동시킴
            if (j > 0)  // 1. 비교를 한번만 수행하도록 보초법을 적용
                a[j] = tmp;  // 빈자리에 임시 저장한 요소를 삽입하여 정렬
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("단순 삽입 정렬");
        System.out.print("요소수: ");
        int nx = stdIn.nextInt();
        int[] x = new int[nx + 1];  // a[0]를 보초로 사용하기 때문에 nx + 1개의 배열을 생성

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
