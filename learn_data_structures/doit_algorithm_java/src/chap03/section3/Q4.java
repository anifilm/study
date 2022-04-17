/* Q4
오른쪽처럼 이진 검색의 과정을 자세히 출력하는 프로그램을 작성하세요. 각 행의 맨 왼쪽에 현재 검색하고
있는 요소의 인덱스를 출력하고, 검색 범위의 맨 앞 요소 위에 <-, 맨 끝 요소 위에 ->, 현재 검색하고
있는 중앙 요소 위에 +를 출력하세요.
*/
package chap03.section3;
import java.util.Scanner;

public class Q4 {
    // 요소수가 n인 배열 a에서 key와 같은 요소를 이진 검색합니다.
    static int binSearch(int[] a, int n, int key) {
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

        int pLeft = 0;       // 검색 범위의 첫 인덱스
        int pRight = n - 1;  // 검색 범위의 끝 인덱스

        do {
            int pCenter = (pLeft + pRight) / 2;  // 중앙 요소의 인덱스

            // 검색 요소 위에 별표 출력
            System.out.print("   |");
            for (int i = 0; i < n; i++) {
                if (i == pLeft)
                    System.out.print(" <-");
                else if (i == pCenter)
                    System.out.print("  +");
                else if (i == pRight)
                    System.out.printf(" ->");
                else
                    System.out.printf("   ");
            }
            System.out.println();

            // 검색 중앙값과 요소 출력
            System.out.printf("%3d|", pCenter);
            for (int j = 0; j < n; j++)
                System.out.printf("%3d", a[j]);
            System.out.println();

            if (a[pCenter] == key)  // 검색 성공
                return pCenter;
            else if (a[pCenter] < key)  // 중간값보다 찾는 값이 크면
                pLeft = pCenter + 1;    // 검색 범위는 뒤쪽으로 좁혀진다.
            else                        // 중간값보다 찾는 값이 작다면
                pRight = pCenter - 1;   // 검색 범위는 앞쪽으로 좁혀진다.
        } while (pLeft <= pRight);

        return -1;  // 검색 실패 (-1을 반환)
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("요소수: ");
        int num = stdIn.nextInt();
        int[] x = new int[num];  // 요소수가 num인 배열

        System.out.println("오름차순으로 입력하세요.");
        System.out.print("x[0]: ");  // 첫 요소 입력
        x[0] = stdIn.nextInt();
        for (int i = 1; i < num; i++) {
            do {
                System.out.print("x[" + i + "]: ");
                x[i] = stdIn.nextInt();
            } while (x[i] < x[i - 1]);  // 바로 앞의 요소의 값보다 작다면 다시 입력
        }

        System.out.print("검색할 값: ");  // 키 값을 입력
        int key = stdIn.nextInt();
        int idx = binSearch(x, num, key);  // 배열 x에서 키 값이 key인 요소를 검색

        if (idx == -1)
            System.out.println("그 값의 요소가 없습니다.");
        else
            System.out.println(key + "은(는) x[" + idx + "]에 있습니다.");
    }
}
