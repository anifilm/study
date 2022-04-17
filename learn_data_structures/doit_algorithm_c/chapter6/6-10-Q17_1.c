/* Q17
방법 1을 사용하여 Q16의 quick 함수(재귀, 비재귀 버전)를 수정하세요.
방법 1. 나눌 배열의 요소 개수가 3 이상이면 임의로 요소 3을 선택하고 그 중에서 중앙값인 요소를 피벗
       으로 선택합니다.
*/
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// a, b, c 중 가운데 값을 구합니다.
int med3(int a, int b, int c) {
    if (a >= b)
        if (b >= c)
            return b;
        else if (a <= c)
            return a;
        else
            return c;
    else if (a > c)
        return a;
    else if (b > c)
        return c;
    else
        return b;
}

// 단순 삽입 정렬
void insertion(int a[], int n) {
    int i, j;
    for (i = 1; i < n; i++) {
        int tmp = a[i];
        for (j = i; j > 0 && a[j - 1] > tmp; j--)
            a[j] = a[j - 1];
        a[j] = tmp;
    }
}

// 퀵 정렬 함수
void quick(int a[], int left, int right) {
    if (right - left < 9)  // 그룹의 요소 개수가 9개 이하이면 단순 삽입 정렬
        insertion(&a[left], right - left + 1);
    else {
        int pl = left;              // 왼쪽 커서
        int pr = right;             // 오른쪽 커서
        int x = med3(a[pl], a[(pl + pr) / 2], a[pr]);  // 방법 1

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
