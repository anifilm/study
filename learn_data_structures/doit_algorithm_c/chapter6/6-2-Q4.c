/* Q4
버블 정렬(버전 2)을 연습문제 Q2(204쪽)처럼 비교, 교환 과정을 자세히 출력하는
프로그램으로 수정하세요.
*/
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 오름차순으로 정렬을 마쳤는지 검사하는 함수
int is_sorted(const int a[], int n) {
    int i;
    for (i = n - 1; i > 0; i--)
        if (a[i - 1] > a[i])
            return 0;   // 교환이 이루어지면 0
    return 1;           // 더이상 교환이 없다면 1
}

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
        // 교환이 수행되지 않았다면 정렬을 멈춥니다.
        if (is_sorted(a, n) == 1) {
            puts("정렬이 완료되어 교환을 멈춤니다.");
            break;
        }
    }
    printf("\n비교를 %d회 했습니다.\n", c_count);
    printf("교환을 %d회 했습니다.\n", s_count);
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("버블 정렬 (버전 2: 교환 횟수에 따라 정렬 작업을 멈춥니다.)");
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
