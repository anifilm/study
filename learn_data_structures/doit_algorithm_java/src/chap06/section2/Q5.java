/* Q5
다음의 배열을 정렬한다고 가정하겠습니다.
  {9, 1, 3, 4, 6, 7, 8}

이 배열은 두번째 요소부터는 정렬은 되어 있지만 버전 3의 버블 정렬 알고리즘을 사용 해도 빠른 시간 안에 정렬
작업을 마칠 수는 없습니다. 왜냐하면 맨 앞에 있는 요소의 값(9)은 1회의 패스틀 거쳐도 한 칸만 뒤로 옳겨지기
때문입니다. 그래서 홀수 번째의 패스는 가장 작은 요소를 맨 앞으로 옮기고 짝수 번째 패스는 가장 큰 요소를 맨
뒤로 옮기는 방식을 사용하면(패스의 스캔 방향을 교대로 바꾸면) 이런 정렬을 더 적은 횟수 로 비교를 수행할 수
있습니다. 버전 3의 프로그램을 개선하여 양방향 버블 정렬을 수행 하는 프로그램을 작성하세요.
버블 정렬을 개선한 이 알고리즘은 양방향 버블 정렬(bidirection bubble sort) 또는 칵테일 정렬(cocktail
sort), 셰이커 정렬(shaker sort)이라는 이름으로 알려져 있습니다.
 */
package chap06.section2;
import java.util.Scanner;

public class Q5 {
    // 배열 요소 a[idx1]과 a[idx2]의 값을 바꿈
    static void swap(int[] a, int idx1, int idx2) {
        int tmp = a[idx1];
        a[idx1] = a[idx2];
        a[idx2] = tmp;
    }
    // 양방향 버블 정렬 (버전4, 홀수 번째 패스는 가장 작은 요소를 맨 앞으로,
    // 짝수 번째 패스는 가장 큰 요소를 맨 뒤로 옮기는 방식)
    static void bubbleSort(int[] a, int n) {
        int ccnt = 0;  // 비교 횟수
        int scnt = 0;  // 교환 횟수

        int pcnt = 1;  // 패스

        int left = 0;
        int right = n - 1;
        int last = right;
        while (left < right) {
            System.out.println("패스 " + pcnt++ + ": (홀수번째)");
            for (int j = right; j > left; j--) {
                for (int k = 0; k < j - 1; k++)
                    System.out.print(a[k] + " ");
                if (a[j - 1] > a[j]) {
                    System.out.print(a[j - 1] + "+" + a[j] + " ");
                    swap(a, j - 1, j);
                    last = j;  // 교환시점을 저장
                    scnt++;
                }
                else
                    System.out.print(a[j - 1] + "-" + a[j] + " ");
                for (int k = j + 1; k < n; k++)
                    System.out.print(a[k] + " ");
                System.out.println();
                ccnt++;
            }
            left = last;  // a[i]보다 왼쪽은 정렬을 마친 상태

            if (left >= right) break;  // 종료 시점 확인 (짝수번째 실행하지 않도록 추가)
            System.out.println("패스 " + pcnt++ + ": (짝수번째)");
            for (int j = left; j < right; j++) {
                for (int k = 0; k < j; k++)
                    System.out.print(a[k] + " ");
                if (a[j] > a[j + 1]) {
                    System.out.print(a[j] + "+" + a[j + 1] + " ");
                    swap(a, j, j + 1);
                    last = j;  // 교환시점을 저장
                    scnt++;
                }
                else
                    System.out.print(a[j] + "-" + a[j + 1] + " ");
                for (int k = j + 2; k < n; k++)
                    System.out.print(a[k] + " ");
                System.out.println();
                ccnt++;
            }
            right = last;  // a[i]보다 오른쪽은 정렬을 마친 상태
        }

        System.out.println("비교를 " + ccnt + "회 했습니다.");
        System.out.println("교환을 " + scnt + "회 했습니다.");
    }

    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("양방향 버블 정렬 (버전4, 과정 출력)");
        System.out.print("요소수: ");
        int nx = stdIn.nextInt();
        int[] x = new int[nx];

        for (int i = 0; i < nx; i++) {
            System.out.print("x[" + i + "]: ");
            x[i] = stdIn.nextInt();
        }

        bubbleSort(x, nx);  // 배열 x를 버블 정렬합니다.

        System.out.println("오름차순으로 정렬했습니다.");
        for (int i = 0; i < nx; i++)
            System.out.println("x[" + i + "] = " + x[i]);
    }
}
