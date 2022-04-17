/* Q1
키뿐만 아니라 사람 수도 난수로 생성하도록 실습 2-5를 수정하여 프로그램을 작성하세요.
 */
package chap02.section1;

import java.util.Random;
import java.util.Scanner;

public class Q1 {
    static int maxOf(int[] a) {
        int max = a[0];
        for (int i = 1; i < a.length; i++) {
            if (a[i] > max)
                max = a[i];
        }
        return max;
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);
        Random rand = new Random();

        System.out.println("키의 최대값을 구합니다.");
        int num = 1 + rand.nextInt(10);  // 사람 수를 난수로 결정 (1~9)
        System.out.println("사람 수: " + num);

        int[] height = new int[num];  // 요소수가 num인 배열을 생성

        for (int i = 0; i < num; i++) {
            height[i] = 100 + rand.nextInt(90);  // 요소의 값을 난수로 결정 (100~189)
            System.out.println("height[" + i + "]: " + height[i]);
        }

        System.out.println("최대값은 " + maxOf(height) + "입니다.");
    }
}
