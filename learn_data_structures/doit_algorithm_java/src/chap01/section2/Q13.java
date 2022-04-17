/* Q13
곱셈이 아니라 덧셈을 출력하는 프로그램을 작성하세요.
앞 문제처럼 표의 위쪽과 왼쪽에 더하는 수를 출력하세요.
 */
package chap01.section2;

public class Q13 {
    public static void main(String[] args) {
        // 가로 숫자 출력
        System.out.print("   |");
        for (int i = 1; i <= 9; i++)
            System.out.printf("%3d", i);
        System.out.println();
        // 가로 라인 출력
        System.out.print("---+");
        for (int i = 1; i <= 9; i++)
            System.out.printf("%3s", "---");
        System.out.println();
        // 곱셈표 출력
        for (int i = 1; i <= 9; i++) {
            System.out.printf("%2d |", i);  // 세로 숫자 출력
            for (int j = 1; j <= 9; j++) {
                System.out.printf("%3d", i + j);
            }
            System.out.println();
        }
    }
}
