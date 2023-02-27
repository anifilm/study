// 재귀 함수 이해하기
package chap05.section2;
import chap04.section1.IntStack;
import java.util.Scanner;

public class RecurX2 {
    // 꼬리 재귀를 제거
    static void recur(int n) {
        IntStack s = new IntStack(n);

        while (true) {
            if (n > 0) {
                s.push(n);  // n의 값을 push
                n -= 1;
                continue;
            }
            if (s.isEmpty() != true) {  // 스택이 비어 있지 않다면
                n = s.pop();  // 저장하고 있던 스택의 값을 pop
                System.out.println(n);
                n -= 2;
                continue;
            }
            break;
        }
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.print("정수를 입력하세요: ");
        int x = stdIn.nextInt();

        recur(x);

        stdIn.close();
    }
}
