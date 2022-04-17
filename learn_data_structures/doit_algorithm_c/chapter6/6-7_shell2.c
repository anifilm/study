// 셀 정렬 (버전 2: h = ..., 13, 4, 1)
#include <stdio.h>
#include <stdlib.h>

// 셀 정렬 함수 2
void shell(int a[], int n) {
    int i, j, h;
    for (h = 1; h < n / 9; h = h * 3 + 1)
        ;
    for ( ; h > 0; h /= 3) {
        for (i = h; i < n; i++) {
            int tmp = a[i];
            for (j = i - h; j >= 0 && a[j] > tmp; j -= h)
                a[j + h] = a[j];
            a[j + h] = tmp;
        }
    }
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("셀 정렬");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성

    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }

    shell(x, nx);  // 배열 x를 셀 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}

/*

라인 8은 h의 초기값을 구합니다. 1부터 시작하여 값을 3배하고 1을 더하면서 n / 9를 넘지
않는 가장 큰 값을 h에 대입합니다.

라인 10에서 버전 1과 다른 점은 h의 값이 변하는 방법입니다. (h값을 3으로 나눕니다.)
반복하여 마지막에 h의 값은 1이 됩니다.  정렬의 시간 복잡도는 O(n^1.25)으로, 이는 기존
의 시간 복잡도인 O(n²)에 비해 매우 빠릅니다. 그러나 이 알고리즘도 멀리 떨어져 있는
요소를 교환해야 하므로 안정적이지는 않습니다.

*/
