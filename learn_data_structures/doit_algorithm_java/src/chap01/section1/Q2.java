/* Q2
세값의 최소값을 구하는 min3 메서드를 작성하세요.
  static int min3(int a, int b, int c)
 */
package chap01.section1;

public class Q2 {
    // a, b, c의 최소값을 구하여 반환합니다.
    static int min3(int a, int b, int c) {
        int min = a;
        if (b < min)
            min = b;
        if (c < min)
            min = c;
        return min;
    }

    public static void main(String[] args) {
        System.out.println("min3(3, 2, 1) = " + min3(3, 2, 1));
        System.out.println("min3(3, 2, 2) = " + min3(3, 2, 2));
        System.out.println("min3(3, 1, 2) = " + min3(3, 1, 2));
        System.out.println("min3(3, 2, 3) = " + min3(3, 2, 3));
        System.out.println("min3(2, 1, 3) = " + min3(2, 1, 3));
        System.out.println("min3(3, 3, 2) = " + min3(3, 3, 2));
        System.out.println("min3(3, 3, 3) = " + min3(3, 3, 3));
        System.out.println("min3(2, 2, 3) = " + min3(2, 2, 3));
        System.out.println("min3(2, 3, 1) = " + min3(2, 3, 1));
        System.out.println("min3(2, 3, 2) = " + min3(2, 3, 2));
        System.out.println("min3(1, 3, 2) = " + min3(1, 3, 2));
        System.out.println("min3(2, 3, 3) = " + min3(2, 3, 3));
        System.out.println("min3(1, 2, 3) = " + min3(1, 2, 3));
    }
}
