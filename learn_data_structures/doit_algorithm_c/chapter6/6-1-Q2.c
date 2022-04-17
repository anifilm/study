/* Q2
오른쪽처럼 비교, 교환 과정을 자세히 출력하면서 버블 정렬하는 프로그램을 작성하세요.
비교하는 두 요소 사이에 교환을 수행하면 '+', 수행하지 않으면 '-'를 출력하고 정렬을
마치면 비교 횟수와 교환 횟수를 출력하세요.
  패스 1:
  6 4 3 7 1 9+8
  6 4 3 7 1-8 9
  6 4 3 7+1 8 9
  6 4 3+1 7-8 9
  6 4+1 3 7 8 9
  6+1 4 3 7 8 9
  1 6 4 3 7 8 9
  패스 2:
  1 6 4 3 7-8-9
  ...중략...
  비교를 21회 했습니다.
  교환을 8회 했습니다.
*/
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 버블 정렬 함수
void bubble(int a[], int n) {
    int c_count = 0;  // 비교 횟수
    int s_count = 0;  // 교환 횟수
    int i, j, k;
    for (i = 0; i < n - 1; i++) {
        printf("패스 %d:\n", i + 1);
        for (j = n - 1; j > i; j--) {
            // 숫자 출력 1
            for (k = 0; k < j - 1; k++)
                printf("%d ", a[k]);
            // 비교후 교환
            if (a[j - 1] > a[j]) {
                printf("%d+%d ", a[j - 1], a[j]);
                swap(int, a[j - 1], a[j]);
                s_count++;  // 교환 횟수 증가
            } else
                printf("%d-%d ", a[j - 1], a[j]);
            // 숫자 출력 2
            for (k = j; k < n - 1; k++)
                printf("%d ", a[k]);
            printf("\n");
            c_count++;  // 비교 횟수 증가
        }
        printf("\n");
    }
    printf("비교를 %d회 했습니다.\n", c_count);
    printf("교환을 %d회 했습니다.\n", s_count);
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("버블 정렬 (과정을 출력합니다.)");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성

    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }
    printf("\n");

    bubble(x, nx);  // 배열 x를 버블 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}
