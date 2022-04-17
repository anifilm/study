/* Q14
오른쪽과 같이 입력한 수를 한 변으로 하는 정사각형을 * 기호로 출력하는 프로그램을 작성하세요.
*/
package chap01.section2;
import java.util.Scanner;

public class Q14 {
    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("사각형을 출력합니다.");
        int n;
        do {
            System.out.print("단수는：");
            n = stdIn.nextInt();
        } while (n <= 0);

        for (int i = 0; i < n; i++) {
            for (int j = 0; j < n; j++)
                System.out.print(" * ");
            System.out.println();
        }
    }
}
