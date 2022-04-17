/* Q15
실습 6-9, 6-10의 quick 함수를 요소의 개수가 적은 그룹을 먼저 나누는 함수로 수정하세요.
*/
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 퀵 정렬 함수
void quick(int a[], int left, int right) {
    int pl = left;              // 왼쪽 커서
    int pr = right;             // 오른쪽 커서
    int x = a[(pl + pr) / 2];   // 피벗은 가운데 요소를 선택합니다.

    do {
        while(a[pl] < x) pl++;
        while(a[pr] > x) pr--;
        if (pl <= pr) {
            swap(int, a[pl], a[pr]);
            pl++;
            pr--;
        }
    } while (pl <= pr);

    // 요소의 개수가 많은 그룹을 먼저 푸시 하도록 swap
    if (pr - left < right - pl) {
        swap(int, pl, left);
        swap(int, pr, right);
    }

    if (left < pr) quick(a, left, pr);
    if (pl < right) quick(a, pl, right);
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("퀵 정렬");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성

    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }

    quick(x, 0, nx - 1);  // 배열 x를 퀵 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}
