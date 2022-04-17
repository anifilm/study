// 단순 선택 정렬
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 단순 선택 정렬 함수
void selection(int a[], int n) {
    int i, j;
    for (i = 0; i < n - 1; i++) {
        int min = i;  // 아직 정렬되지 않은 부분에서 가장 작은 요소의 인덱스를 기록
        for (j = i + 1; j < n; j++)
            if (a[j] < a[min]) min = j;
        swap(int, a[i], a[min]);  // 아직 정렬되지 않은 부분의 첫 요소와 가장 작은 요소를 교환
    }
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("단순 선택 정렬");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성

    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }

    selection(x, nx);  // 배열 x를 단순 선택 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}

/*

단순 선택 정렬 (straight selection sort)은 가장 작은 요소부터 선택해 알맞은 위치로
옮겨서 순서대로 정렬하는 알고리즘 입니다.

단순 선택 정렬 알고리즘의 요소값을 비교하는 횟수는 (n²-n)/2회 입니다. 그런데 이 정렬
알고리즘은 서로 떨어져 있는 요소를 교환하는 것이기 때문에 안정적이지 않습니다.

{3L, 4, 2, 3R, 1}   // 3L과 1을 교환
 ↑             ↑
{1, 4, 2, 3R, 3L}   // 4와 2를 교화
    ↑  ↑
{1, 2, 4, 3R, 3L}   // 4와 3R을 교환
       ↑  ↑
{1, 2, 3R, 4, 3L}   // 4와 3L을 교환
           ↑  ↑
{1, 2, 3R, 3L, 4}   // 수행 완료

위는 안정적이지 않은 정렬을 수행할 때의 모습입니다. 값이 3인 요소가 중복해서 있을 때
두 요소의 순서가 뒤바뀌는 것을 알 수 있습니다.

*/
