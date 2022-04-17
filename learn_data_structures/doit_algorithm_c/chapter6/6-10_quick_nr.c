// 퀵 정렬을 비재귀적으로 구현한 프로그램
#include <stdio.h>
#include <stdlib.h>
#include "6-10_IntStack.h"

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

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
        int x = a[(left + right) / 2];          // 피벗은 가운데 요소
        do {
            while(a[pl] < x) pl++;
            while(a[pr] > x) pr--;
            if (pl <= pr) {
                swap(int, a[pl], a[pr]);
                pl++;
                pr--;
            }
        } while (pl <= pr);

        if (left < pr) {
            Push(&lstack, left);    // 왼쪽 그룹 범위의
            Push(&rstack, pr);      // 인덱스를 푸시
        }
        if (pl < right) {
            Push(&lstack, pl);      // 오른쪽 그룹 범위의
            Push(&rstack, right);   // 인덱스를 푸시
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
