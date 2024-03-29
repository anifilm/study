/* Q8
실스 5-9의 print 메서드를 수정하여 전각 기호 '■'와 '□'를 사용해 퀸의 배치 상황을 출력하세요.
*/
package chap05.section4;

public class Q8_EightQueen {
    static boolean[] flag_a = new boolean[8];  // 각 행에 퀸을 배치했는지 체크
    static boolean[] flag_b = new boolean[15]; // / 대각선 방향으로 퀸을 배치했는지 체크
    static boolean[] flag_c = new boolean[15]; // \ 대각선 방향으로 퀸을 배치했는지 체크
    static int[] pos = new int[8];  // 각 열의 퀸의 위치

    // 각 열의 퀸의 위치를 출력합니다.
    static void print() {
        for (int i = 0; i < 8; i++) {
            for (int j = 0; j < 8; j++) {
                System.out.printf("%s", j == pos[i] ? "■" : "□");
            }
            System.out.println();
        }
        System.out.println();
    }

    // i열의 알맞은 위치에 퀸을 배치합니다.
    static void set(int i) {
        for (int j = 0; j < 8; j++) {
            if (flag_a[j] == false && flag_b[i+j] == false && flag_c[i-j+7] == false) {  // j행에는 퀸을 아직 배치하지 않았다면
                pos[i] = j;  // 퀸을 j행에 배치합니다.
                if (i == 7) print();  // 모든 열에 배치한 경우
                else {
                    flag_a[j] = flag_b[i+j] = flag_c[i-j+7] = true;
                    set(i + 1);  // 다음 열에 퀸을 배치합니다.
                    flag_a[j] = flag_b[i+j] = flag_c[i-j+7] = false;
                }
            }
        }
    }

    public static void main(String[] args) {
        set(0);  // 0열에 퀸을 배치합니다.
    }
}
