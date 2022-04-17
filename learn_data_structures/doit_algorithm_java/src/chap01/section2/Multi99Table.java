// 곱셈표를 출력합니다.
package chap01.section2;

public class Multi99Table {
    public static void main(String[] args) {
        System.out.printf("%20s\n", "----- 곱셈표 -----");
        for (int i = 1; i <= 9; i++) {
            for (int j = 1; j <= 9; j++)
                System.out.printf("%3d", i * j);
            System.out.println();
        }
    }
}
