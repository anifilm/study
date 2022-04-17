/* Q18
방법 2을 사용하여 Q16의 quick 함수(재귀, 비재귀 버전)를 수정하세요.
방법 2. 나눌 배열의 처음, 가운데, 끝 요소를 정렬한 다음 가운데 요소와 끝에서 두번째 요소를 교환합니다.
       피벗으로 끝에서 두 번째 요소의 값(a[right - 1])을 선택하여 나눌 대상의 범위를 a[left + 1] ~
       a[right - 2]로 좁힙니다.
*/
#include <stdio.h>
#include <stdlib.h>

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

// 퀵 정렬 함수
void quick(int a[], int left, int right) {
    if (right - left < 9)  // 그룹의 요소 개수가 9개 이하이면 단순 삽입 정렬
        insertion(&a[left], right - left + 1);
    else {
        int pl = left;              // 왼쪽 커서
        int pr = right;             // 오른쪽 커서

        int x;  // 방법 2
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
