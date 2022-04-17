// 배열의 분할 과정을 출력하는 퀵 정렬 프로그램
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 퀵 정렬 함수 (분할과정을 출력)
void quick(int a[], int left, int right) {
    int pl = left;              // 왼쪽 커서
    int pr = right;             // 오른쪽 커서
    int x = a[(pl + pr) / 2];   // 피벗은 가운데 요소를 선택합니다.

    int i;
    printf("a[%d] ~ a[%d] : {", left, right);
    for (i = left; i < right; i++)
        printf("%d, ", a[i]);
    printf("%d}\n", a[right]);

    do {
        while(a[pl] < x) pl++;
        while(a[pr] > x) pr--;
        if (pl <= pr) {
            swap(int, a[pl], a[pr]);
            pl++;
            pr--;
        }
    } while (pl <= pr);

    if (left < pr) quick(a, left, pr);
    if (pl < right) quick(a, pl, right);
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("퀵 정렬 (분할과정 출력)");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성

    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }
    printf("\n");

    quick(x, 0, nx - 1);  // 배열 x를 퀵 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}
