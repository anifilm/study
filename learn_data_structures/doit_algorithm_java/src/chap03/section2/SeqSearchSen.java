// 선형 검색 (보초법, sentinel method)
package chap03.section2;
import java.util.Scanner;

public class SeqSearchSen {
    // 요소수가 n인 배열 a에서 key와 같은 요소를 보초법으로 선형 검색합니다.
    static int seqSearch(int[] a, int n, int key) {
        int i = 0;
        a[n] = key;  // 보초(sentinel)를 추가
        while (true) {
        //  if (i == n)
        //      return -1;    // 보초법을 사용하여 검색 실패에 대한 종료 조건을 제거
            if (a[i] == key)  // 검색 성공
            //  return i;
                break;
            i++;
        }
        return i == n ? -1 : i;  // 검색 성공시 인덱스를 반환, 검색이 마지막 까지 진행되었다면 -1 반환
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("요소수: ");
        int num = stdIn.nextInt();
        int[] x = new int[num + 1];  // 요소수 num + 1

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
