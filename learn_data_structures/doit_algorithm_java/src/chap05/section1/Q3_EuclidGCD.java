/* Q3
배열 a의 모든 요소의 최대공약수를 구하는 다음 메서드를 작성하세요.
static int gcdArray(int[] a)
 */
package chap05.section1;
import java.util.Scanner;

public class Q3_EuclidGCD {
    static int gcd(int x, int y) {
        while (y != 0) {
            int tmp = y;
            y = x % y;
            x = tmp;
        }
        return x;
    }

    static int gcdArray(int[] a, int start, int no) {
        if (no == 1) {
            return a[start];
        } else if (no == 2) {
            return gcd(a[start], a[start + 1]);
        } else
			return gcd(a[start], gcdArray(a, start + 1, no - 1));
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

		System.out.print("몇 개 정수의 최대 공약수를 구할까요?: ");
		int num;
		do {
			num = stdIn.nextInt();
		} while (num <= 1);

		int[] x = new int[num]; // 길이가 num인 배열

		for (int i = 0; i < num; i++) {
			System.out.print("x[" + i + "]: ");
			x[i] = stdIn.nextInt();
		}

		System.out.println("최대 공약수는 " + gcdArray(x, 0, num) + "입니다.");

        stdIn.close();
    }
}
