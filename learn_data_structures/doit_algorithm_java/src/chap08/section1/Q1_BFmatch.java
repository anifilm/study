/* Q1
오른쪽처럼 브루트-포스법의 검색 과정을 자세히 출력하는 프로그램을 작성하세요. 패턴을 옮길 때마다 검사하는 텍스트의 첫 번째 문자 인덱스를 출력하고 검사 과정에서 비교하는 두 문자가 일치하면 +, 다르면 |를 출력하도록 하세요. 마지막에는 비교한 횟수를 출력하도록 하세요.
*/
package chap08.section1;
import java.util.Scanner;

public class Q1_BFmatch {
    static void printSpace(int pt, int pp) {
        for (int i = 0; i < pt+pp+2; i++) {
            System.out.print(" ");
        }
    }

    // 브투트-포스법으로 문자열을 검색하는 메서드
    static int bfMatch(String txt, String pat) {
        int pt = 0; // txt 커서
        int pp = 0; // pat 커서
        int count = 0; // 검색 횟수
        int k = -1;

        while (pt != txt.length() && pp != pat.length()) {
            // 공백 라인
            System.out.println();
            // 횟수와 비교 문자열 출력
			if (k == pt-pp) {
				System.out.print("  ");
            }
			else {
				System.out.printf("%d ", pt-pp);
				k = pt-pp;
			}
            System.out.println(txt);

            // 일치 또는 불칠치시 공백과 '+' or '|' 출력
            printSpace(pt-pp, pp);
            System.out.println(txt.charAt(pt) == pat.charAt(pp) ? "+" : "|");
            // 패턴 문자 출력
            printSpace(pt-pp, 0);
            System.out.println(pat);

            count++;

            if (txt.charAt(pt) == pat.charAt(pp)) {
                pt++;
                pp++;
            }
            else {
                pt = pt - pp + 1;
                pp = 0;
            }
        }

        if (pp == pat.length()) { // 검색 성공!
            System.out.printf("\n비교는 %d회였습니다.\n\n", count);
            return pt - pp;
        }

        return -1; // 검색 실패!
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("텍스트: ");
        String s1 = stdIn.next(); // 텍스트용 문자열

        System.out.print("패턴: ");
        String s2 = stdIn.next(); // 패턴용 문자열

        int idx = bfMatch(s1, s2); // 문자열 s1에서 문자열 s2를 검색

        if (idx == -1) {
            System.out.println("텍스트에 패턴이 없습니다.");
        }
        else {
            // 일치하는 문자 바로 앞까지의 길이를 구합니다.
            int len = 0;
            for (int i = 0; i < idx; i++) {
                len += s1.substring(i, i+1).getBytes().length;
            }
            len += s2.length();

            System.out.println((idx+1) + "번째 문자부터 일치합니다.");
            System.out.println("텍스트: " + s1);
            System.out.printf(String.format("패턴: %%%ds\n", len), s2);
        }
    }
}
