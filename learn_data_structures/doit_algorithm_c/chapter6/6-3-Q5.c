/* Q5
연습문제 Q2(204쪽)와 마찬가지로 비교, 교환 과정을 자세히 출력하는 프로그램(실습
6-3)으로 수정하세요.
*/
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 버블 정렬 함수 3
void bubble(int a[], int n) {
    int c_count = 0;  // 비교 횟수
    int s_count = 0;  // 교환 횟수
    int p_count = 1;

    int i = 0;  // a[i]보다 앞쪽의 요소는 정렬을 마친 상태입니다.
    while (i < n - 1) {
        int j, k;
        int last = n - 1;  // 마지막으로 교환을 수행한 위치를 저장합니다.
        printf("패스 %d:\n", p_count++);
        for (j = n - 1; j > i; j--) {
            // 숫자 출력 1
            for (k = 0; k < j - 1; k++)
                printf("%d ", a[k]);
            if (a[j - 1] > a[j]) {
                printf("%d+%d ", a[j - 1], a[j]);
                swap(int, a[j - 1], a[j]);
                s_count++;
                last = j;
            } else
                printf("%d-%d ", a[j - 1], a[j]);
            // 숫자 출력 2
            for (k = j; k < n - 1; k++)
                printf("%d ", a[k]);
            printf("\n");
            c_count++;
        }
        printf("\n");
        i = last;
    }
    printf("\n비교를 %d회 했습니다.\n", c_count);
    printf("교환을 %d회 했습니다.\n", s_count);
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("버블 정렬 (버전 3: 스캔 범위를 제한합니다.)");
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
