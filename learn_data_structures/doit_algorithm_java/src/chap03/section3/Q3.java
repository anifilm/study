/* Q3
요소수가 n인 배열 a에서 key와 일치하는 모든 요소의 인덱스를 배열 idx의 맨 앞부터 순서대로 저장하고, 일치한
요소수를 반환하는 메서드를 작성하세요. 예를 들어 요소수가 8일 배열 a의 요소가 {1, 9, 2, 9, 4, 6, 7, 9}
이고 key가 9면 배열 idx에 {1, 3, 7}을 저장하고 3을 반환합니다.
 */
package chap03.section3;
import java.util.Scanner;

public class Q3 {
    // 배열 a의 앞쪽 n개 요소에서 key와 같은 모든 요소의 index를 배열 idx의 머리부터 차례로 저장하여
    // 같은 요소수를 반환
    static int searchIdx(int[] a, int n, int key, int[] idx) {
        int count = 0;  // key와 같은 요소수
        for (int i = 0; i < n; i++) {
            if (a[i] == key)
                idx[count++] = i;
        }
        return count;
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("요소수: ");
        int num = stdIn.nextInt();
        int[] x = new int[num];  // 요소수가 num인 배열 x
        int[] y = new int[num];  // 요소수가 num인 배열 y

        for (int i = 0; i < num; i++) {
            System.out.print("x[" + i + "]: ");
            x[i] = stdIn.nextInt();
        }

        System.out.print("검색할 값: ");  // 키 값을 입력
        int key = stdIn.nextInt();
        int count = searchIdx(x, num, key, y);

        if (count == -1)
            System.out.println("그 값의 요소가 없습니다.");
        else {
            for (int i = 0; i < count; i++)
                System.out.println("그 값은 " + "x[" + y[i] + "]에 있습니다.");
        }
    }
}
