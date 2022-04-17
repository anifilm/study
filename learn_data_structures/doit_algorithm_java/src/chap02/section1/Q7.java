/* Q7
오른쪽처림 기수 변환 과정을 자세히 나타내는 프로그램을 작성하세요.
*/
package chap02.section1;
import java.util.Scanner;

public class Q7 {
    // 정수값 x를 r진수로 변환하여 배열 d에 윗자리부터 넣어두고 자릿수를 반환
    static int cardConv(int x, int r, char[] d) {
        int digits = 0;  // 변환 후의 자릿수
        String dchar = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        do {
            d[digits] = dchar.charAt(x % r);  // r로 나눈 나머지를 저장
            // 변환 과정 출력
            if (digits == 0)
                System.out.printf("\n%2d| %8d\n", r, x);
            else
                System.out.printf("%2d| %8d ... %c\n", r, x, d[digits - 1]);
            System.out.println("  +----------");
            x /= r;
            digits++;
        } while (x != 0);
        // 변환 과정 출력 마지막
        System.out.printf("    %8d ... %c\n", x, d[digits - 1]);
        // 배열 요소를 역순으로 정렬
        for (int i = 0; i < digits / 2; i++) {  // d[0] ~ d[digits-1]
            char tmp = d[i];
            d[i] = d[digits - 1 - i];
            d[digits-1-i] = tmp;
        }
        return digits;
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        int no;     // 변환하는 정수
        int cd;     // 기수
        int dno;    // 변환 후의 자릿수
        int retry;  // 다시 한 번?
        char[] cno = new char[32];  // 변환 후 각 자리의 숫자를 넣어두는 문자의 배열

        System.out.println("10진수를 기수 변환합니다.");
        do {
            do {
                System.out.print("변환하는 음이 아닌 정수: ");
                no = stdIn.nextInt();
            } while (no < 0);

            do {
                System.out.print("어떤 지수로 변환할까요? (2~36): ");
                cd = stdIn.nextInt();
            } while (cd < 2 || cd > 36);

            dno = cardConv(no, cd, cno);  // no를 cd진수로 변환

            System.out.print(cd + "진수로는 ");
            for (int i = 0; i < dno; i++)  // 아랫자리부터 차례로 출력
                System.out.print(cno[i]);
            System.out.println("입니다.");

            System.out.print("한번 더 할까요? (예:1/아니오:2) >> ");
            retry = stdIn.nextInt();
        } while (retry == 1);
    }
}
