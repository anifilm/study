// 단순 삽입 정렬
#include <stdio.h>
#include <stdlib.h>

// 단순 삽입 정렬 함수
void insertion(int a[], int n) {
    int i, j;
    for (i = 1; i < n; i++) {
        int tmp = a[i];  // 두 번째 요소부터 임시로 저장하여 진행

        // 1. 정렬된 열의 왼쪽 끝에 도달하거나 (j가 0보다 크다)
        // 2. tmp보다 작거나 같은 key를 갖는 항목 a[j]를 찾을때 까지 (a[j-1]값이 tmp보다 크다)
        for (j = i; j > 0 && a[j - 1] > tmp; j--)  // 역순으로 진행하며
            a[j] = a[j - 1];  // 앞의 인덱스의 요소를 한칸씩 뒤로 이동시킴
        a[j] = tmp;  // 빈자리에 임시 저장한 요소를 삽입하여 정렬
    }
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("단순 삽입 정렬");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성

    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }

    insertion(x, nx);  // 배열 x를 단순 삽입 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}

/*

단순 삽입 정렬 (straight insertion sort)은 선택한 요소를 그보다 더 앞쪽에 알맞은
위치에 '삽입하는' 작업을 반복하여 정렬하는 알고리즘 입니다. 단순 선택 정렬과 비슷하게
보일 수 있지만 단순 선택 정렬은 값이 가장 작은 요소를 선택해 알맞은 위치로 옮긴다는
점이 다릅니다.

단순 정렬의 시간 복잡도
지금까지 공부한 세가지 단순 정렬 (버블, 선택, 삽입)의 시간 복잡도는 모두 O(n²)입니다.
(효율이 좋지 않습니다.)

*/
