/* Q5
우리가 살펴본 이진 검색 알고리즘 프로그램은 검색할 값과 같은 값을 갖는 요소가 하나 이상일 경우 그 요소 중에서
맨 앞의 요소를 찾지 못합니다. 예를 들어, 아래 그림의 배열에서 7을 검색하면 중앙에 위치하는 a[5]를 검색합니다.
맨 앞의 요소를 찾는 binSearchX 메서드를 작성해보세요.
  static int binSearchX(int[] a, int n, int key)

이진 검색 알고리즘에 의해 검색에 성공했을 때([a]) 그 위치로 부터 앞쪽으로 하나씩 검사하면 ([b]) 여러 요소가
일치하는 경우에도 가장 앞쪽에 위치하는 요소의 인덱스를 찾아냅니다.
*/
package chap03.section3;
import java.util.Scanner;

public class Q5 {
    // 요소수가 n인 배열 a에서 key와 같은 요소를 이진 검색 (가장 앞쪽에 있는 요소를 검색)
    static int binSearchX(int[] a, int n, int key) {
        int pLeft = 0;       // 검색 범위의 첫 인덱스
        int pRight = n - 1;  // 검색 범위의 끝 인덱스

        do {
            int pCenter = (pLeft + pRight) / 2;  // 중앙 요소의 인덱스
            if (a[pCenter] == key) {
                while (pCenter > pLeft) {  // key와 같은 맨 앞의 요소를 검색
                    if (a[pCenter - 1] < key)
                        break;
                    pCenter--;
                }
                return pCenter;  // 검색 성공
            }
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
        int idx = binSearchX(x, num, key);  // 배열 x에서 키 값이 key인 요소를 검색

        if (idx == -1)
            System.out.println("그 값의 요소가 없습니다.");
        else
            System.out.println(key + "은(는) x[" + idx + "]에 있습니다.");
    }
}
