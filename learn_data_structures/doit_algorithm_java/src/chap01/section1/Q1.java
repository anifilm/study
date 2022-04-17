/* Q1
네값의 최대값을 구하는 max4 메서드를 작성하세요.
  static int max4(int a, int b, int c, int d)

작성한 메서드를 테스트 하기 위해 main 메서드를 포함한 프로그램을 작성해야 합니다.
이후의 문제도 마찬가지 입니다.
 */
package chap01.section1;

public class Q1 {
    // a, b, c의 최소값을 구하여 반환합니다.
    static int max4(int a, int b, int c, int d) {
        int max = a;
        if (b > max)
            max = b;
        if (c > max)
            max = c;
        if (d > max)
            max = d;
        return max;
    }

    public static void main(String[] args) {
        System.out.println("max4(3, 2, 1, 4) = " + max4(3, 2, 1, 4));
        System.out.println("max4(3, 2, 2, 1) = " + max4(3, 2, 2, 1));
        System.out.println("max4(3, 4, 2, 1) = " + max4(3, 4, 2, 1));
    }
}
