// 버블 정렬 (버전 3: 스캔 범위를 제한합니다.)
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 버블 정렬 함수 3
void bubble(int a[], int n) {
    int i = 0;              // a[k]보다 앞쪽의 요소는 정렬을 마친 상태입니다.
    while (i < n - 1) {
        int j;
        int last = n - 1;   // 마지막으로 교환을 수행한 위치를 저장합니다.
        for (j = n - 1; j > i; j--) {
            if (a[j - 1] > a[j]) {
                swap(int, a[j - 1], a[j]);
                last = j;
            }
        }
        i = last;
    }
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

    bubble(x, nx);  // 배열 x를 버블 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}

/*

교환을 하다가 어떤 시점 이후에 교환이 수행되지 않는다면 그보다 앞쪽의 요소는 이미
정렬을 마친 상태라고 생각해도 좋습니다. 따라서 두번째 패스는 첫 요소를 제외한 6개
의 요소가 아니라 4개의 요소에 대해서 비교, 교환을 수행하면 됩니다.

*/
