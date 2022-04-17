/* Q12
오른쪽과 같이 위쪽과 왼쪽에 곱하는 수가 있는 곱셈표를 출력하는 프로그램을 작성하세요.
구분선은 수직선 기호(|), 마이너스 기호(-), 플러스 기호(+)를 사용하세요.
 */
package chap01.section2;

public class Q12 {
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
                System.out.printf("%3d", i * j);
            }
            System.out.println();
        }
    }
}
