/* Q13
아래 형식으로 동작하는 quick_sort 함수를 구현하세요. 두번째 매개변수인 n은
요소의 개수 입니다.
  void quick_sort(int a[], int n);

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

    if (left < pr) quick(a, left, pr);
    if (pl < right) quick(a, pl, right);
}

// 퀵 정렬 (배열, 요소수)
void quick_sort(int a[], int n) {
    quick(a, 0, n - 1);
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

    quick_sort(x, nx);  // 배열 x를 퀵 정렬 (배열, 요소수)

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}
