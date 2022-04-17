// 입력한 정수값이 양수인지 음수인지 0인지 판단합니다.
package chap01.section1;
import java.util.Scanner;

public class JudgeSign {
    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("정수를 입력하세요: ");
        int n = stdIn.nextInt();

        if (n > 0)
            System.out.println("이 수는 양수 입니다.");
        else if (n < 0)
            System.out.println("이 수는 음수 입니다.");
        else
            System.out.println("이 수는 0 입니다.");
    }
}
