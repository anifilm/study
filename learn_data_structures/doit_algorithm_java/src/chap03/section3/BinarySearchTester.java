// Arrays.binarySearch로 이진 검색 (정렬이 되어있는 것을 전제로 한다.)
package chap03.section3;
import java.util.Arrays;
import java.util.Scanner;

public class BinarySearchTester {
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
        int idx = Arrays.binarySearch(x, key);  // 배열 x에서 키 값이 key인 요소를 검색

        if (idx < 0)
            System.out.println("그 값의 요소가 없습니다.");
        else
            System.out.println(key + "은(는) x[" + idx + "]에 있습니다.");
    }
}

/*

Arrays.binarySearch에 의한 이진 검색

- 검색에 성공한 경우
key와 일치하는 요소의 인덱스를 반환
일치하는 요소가 여러 개 있다면 무작위의 인덱스를 반환

- 검색에 실패한 경우
반환값은 삽입 포인트를 x라고 할 때 -x - 1 을 반환
삽입 포인트는 검색하기 위해 지정한 key보다 큰 요소중 첫 번째 요소의 인덱스
만약 배열의 모든 요소가 key보다 작다면 배열의 길이를 삽입 포인트로 함

 */
