/* Q17
방법 1을 사용하여 Q16의 quick 함수(재귀, 비재귀 버전)를 수정하세요.
방법 1. 나눌 배열의 요소 개수가 3 이상이면 임의로 요소 3을 선택하고 그 중에서 중앙값인 요소를 피벗
       으로 선택합니다.
*/
#include <stdio.h>
#include <stdlib.h>
#include "6-10_IntStack.h"

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

// 퀵 정렬 함수 (비재귀적 구현)
void quick(int a[], int left, int right) {
    IntStack lstack;    // 나눌 첫 요소 인덱스의 스택
    IntStack rstack;    // 나눌 끝 요소 인텍스의 스택

    // 스택 생성
    Initialize(&lstack, right - left + 1);
    Initialize(&rstack, right - left + 1);

    Push(&lstack, left);
    Push(&rstack, right);

    while (!IsEmpty(&lstack)) {
        int pl = (Pop(&lstack, &left), left);   // 왼쪽 커서
        int pr = (Pop(&rstack, &right), right); // 오른쪽 커서
        int x = med3(a[pl], a[(pl + pr) / 2], a[pr]);  // 방법 1

        if (right - left < 9)  // 그룹의 요소 개수가 9개 이하이면 단순 삽입 정렬
            insertion(&a[left], right - left + 1);
        else {
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

            if (left < pr) {
                Push(&lstack, left);    // 왼쪽 그룹 범위의
                Push(&rstack, pr);      // 인덱스를 푸시
            }
            if (pl < right) {
                Push(&lstack, pl);      // 오른쪽 그룹 범위의
                Push(&rstack, right);   // 인덱스를 푸시
            }
        }
    }
    Terminate(&lstack);
    Terminate(&rstack);
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("퀵 정렬 (비재귀적)");
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
