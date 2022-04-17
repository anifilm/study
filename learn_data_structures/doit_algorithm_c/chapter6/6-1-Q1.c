/* Q1
버블 정렬의 각 패스에서 비교, 교환은 처음(왼쪽)부터 수행해도 됩니다. (각 패스에서
가장 큰 값의 요소가 끝으로 옮겨집니다.) 그렇게 수정한 프로그램을 작성하세요.
*/
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 버블 정렬 함수
void bubble(int a[], int n) {
    int i, j;
    for (i = n - 1; i > 0; i--) {
        for (j = 0; j < i; j++) {
            if (a[j] > a[j + 1])
                swap(int, a[j], a[j + 1]);
        }
    }
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("버블 정렬");
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
