// 버블 정렬 (버전 2: 교환 횟수에 따라 정렬 작업을 멈춥니다.)
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 버블 정렬 함수 2
void bubble(int a[], int n) {
    int i, j;
    for (i = 0; i < n - 1; i++) {
        int exchg = 0;      // 패스에서 시도한 교환 횟수
        for (j = n - 1; j > i; j--) {
            if (a[j - 1] > a[j]) {
                swap(int, a[j - 1], a[j]);
                exchg++;
            }
        }
        // 교환이 수행되지 않았다면 정렬을 멈춥니다.
        if (exchg == 0) {
            puts("정렬이 완료되어 교환을 멈춤니다.");
            break;
        }
    }
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

    bubble(x, nx);  // 배열 x를 버블 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}

/*

어떤 패스에서 요소의 교환 횟수가 0이면 더 이상 정렬할 요소가 없다는 뜻이기 때문에
정렬 작업을 멈추면 됩니다.

*/
