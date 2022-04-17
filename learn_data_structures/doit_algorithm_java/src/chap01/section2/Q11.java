/* Q10
양의 정수를 입력하고 자릿수를 출력하는 프로그램을 작성하세요. 예를 들어 125를 입력하면
'그 수는 3자리 입니다.' 라고 출력하고, 1314를 입력하면 '그 수는 4자리 입니다.' 라고
출력하면 됩니다.
 */
package chap01.section2;
import java.util.Scanner;

public class Q11 {
    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("양의 정수값의 자릿수를 구합니다.");
        int num;
        do {
            System.out.print("정수값: ");
            num = stdIn.nextInt();
        } while (num <= 0);

        int count = 0;
        while (num > 0) {
            num /= 10;
            count++;
        }
        System.out.println("그 수는 " + count + "자리 입니다.");
    }
}
