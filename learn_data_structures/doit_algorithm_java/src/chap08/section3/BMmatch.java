// Boyer-Moore법으로 문자열을 검색
package chap08.section3;
import java.util.Scanner;

public class BMmatch {
    // Boyer-Moore법에 의한 문자열 검색하는 메서드
    static int bmMatch(String txt, String pat) {
        int pt; // txt 커서
        int pp; // pat 커서
        int txtLen = txt.length(); // txt의 문자 개수
        int patLen = pat.length(); // pat의 문자 개수
        int[] skip = new int[Character.MAX_VALUE+1]; // 건너뛰기 표

        // 건너뛰기 표를 만듭니다.
        for (pt = 0; pt <= Character.MAX_VALUE; pt++) {
            skip[pt] = patLen;
        }
        for (pt = 0; pt < patLen-1; pt++) {
            skip[pat.charAt(pt)] = patLen - pt - 1; // pt == patLen-1
        }
        // 검색
        while (pt < txtLen) {
            pp = patLen-1; // pat의 끝 문자에 주목
            while (txt.charAt(pt) == pat.charAt(pp)) {
                if (pp == 0) return pt; // 검색 성공
                pp--;
                pt--;
            }
            pt += (skip[txt.charAt(pt)] > patLen - pp) ? skip[txt.charAt(pt)] : patLen - pp;
        }
        return -1; // 검색 실패!
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("텍스트: ");
        String s1 = stdIn.next(); // 텍스트용 문자열

        System.out.print("패턴: ");
        String s2 = stdIn.next(); // 패턴용 문자열

        int idx = bmMatch(s1, s2); // 문자열 s1에서 문자열 s2를 Boyer-Moore법으로 검색

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

            System.out.println("\n"+ (idx+1) + "번째 문자부터 일치합니다.");
            System.out.println("텍스트: " + s1);
            System.out.printf(String.format("패턴:   %%%ds\n", len), s2);
        }
    }
}
