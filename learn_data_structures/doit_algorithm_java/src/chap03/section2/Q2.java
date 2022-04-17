/* Q2
오른쪽처럼 선형 검색의 스캐닝 과정을 상세하게 출력하는 프로그램을 작성하세요. 이때 각 행의 맨 왼쪽에
현재 검색하는 요소의 인덱스를 출력하고, 현재 검색하고 있는 요소 위에 별표 기호 *를 출력하세요.
 */
package chap03.section2;
import java.util.Scanner;

public class Q2 {
    // 요소수가 n인 배열 a에서 key와 같은 요소를 선형 검색합니다.
    static int seqSearch(int[] a, int n, int key) {
        // 가로 줄번호 출력
        System.out.print("   |");
        for (int i = 0; i < n; i++)
            System.out.printf("%3d", i);
        System.out.println();
        // 가로 라인 출력
        System.out.print("---+");
        for (int i = 0; i < n; i++)
            System.out.print("---");
        System.out.println();

        for (int i = 0; i < n; i++) {
            // 검색 요소 위에 별표 출력
            System.out.print("   |");
            for (int j = 0; j < n; j++) {
                if (j == i) {
                    System.out.print("  *");
                    break;
                }
                else
                    System.out.printf("   ");
            }
            System.out.println();
            // 검색 인덱스와 요소 출력
            System.out.printf("%3d|", i);
            for (int j = 0; j < n; j++)
                System.out.printf("%3d", a[j]);
            System.out.println();

            if (a[i] == key)
                return i;  // 검색 성공 (인덱스를 반환)
        }
        return -1;  // 검색 실패 (-1을 반환)
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("요소수: ");
        int num = stdIn.nextInt();
        int[] x = new int[num];  // 요소수가 num인 배열

        for (int i = 0; i < num; i++) {
            System.out.print("x[" + i + "]: ");
            x[i] = stdIn.nextInt();
        }

        System.out.print("검색할 값: ");  // 키 값을 입력
        int key = stdIn.nextInt();
        int idx = seqSearch(x, num, key);  // 배열 x에서 키 값이 key인 요소를 검색

        if (idx == -1)
            System.out.println("그 값의 요소가 없습니다.");
        else
            System.out.println(key + "은(는) x[" + idx + "]에 있습니다.");
    }
}
