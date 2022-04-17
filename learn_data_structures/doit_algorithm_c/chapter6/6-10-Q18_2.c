/* Q18
방법 2을 사용하여 Q16의 quick 함수(재귀, 비재귀 버전)를 수정하세요.
방법 2. 나눌 배열의 처음, 가운데, 끝 요소를 정렬한 다음 가운데 요소와 끝에서 두번째 요소를 교환합니다.
       피벗으로 끝에서 두 번째 요소의 값(a[right - 1])을 선택하여 나눌 대상의 범위를 a[left + 1] ~
       a[right - 2]로 좁힙니다.
*/
#include <stdio.h>
#include <stdlib.h>
#include "6-10_IntStack.h"

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// x[a], x[b], x[c]를 sort (중앙값의 index를 반환)
int sort3elem(int x[], int a, int b, int c) {
    if (x[b] < x[a]) swap(int, x[b], x[a]);
    if (x[c] < x[b]) swap(int, x[c], x[b]);
    if (x[b] < x[a]) swap(int, x[b], x[a]);
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
        int x;

        if (right - left < 9)  // 그룹의 요소 개수가 9개 이하이면 단순 삽입 정렬
            insertion(&a[left], right - left + 1);
        else {
            int m = sort3elem(a, pl, (pl + pr) / 2, pr);
            x = a[m];
            swap(int, a[m], a[right - 1]);
            pl++;
            pr -= 2;

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
