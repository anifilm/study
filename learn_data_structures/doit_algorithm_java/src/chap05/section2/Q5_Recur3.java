/* Q5
다음의 recur3 메서드를 비재귀적으로 구현하세요.

static void recur3(int n) {
    if (n > 0) {
        recur3(n - 1);
        recur3(n - 2);
        System.out.println(n);
    }
}
*/
package chap05.section2;
import java.util.Scanner;

public class Q5_Recur3 {
    static void recur3(int n) {
        int[] nstk = new int[100];
        int[] sstk = new int[100];
        int ptr = -1;
        int sw = 0;

        while (true) {
            if (n > 0) {
                ptr++;
                nstk[ptr] = n;
                sstk[ptr] = sw;

                if (sw == 0) {
                    n -= 1;
                } else if (sw == 1) {
                    n -= 2;
                    sw = 0;
                }
                continue;
            }
            do {
                n = nstk[ptr];
                sw = sstk[ptr--] + 1;
                if (sw == 2) {
                    System.out.println(n);
                    if (ptr < 0) return;
                }
            } while (sw == 2);
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("정수를 입력하세요: ");
        int x = stdIn.nextInt();

        recur3(x);

        stdIn.close();
    }
}
