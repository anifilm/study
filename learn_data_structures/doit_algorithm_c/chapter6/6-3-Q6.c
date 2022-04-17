/* Q6
다음의 배열을 정렬한다고 가정하겠습니다.
  {9, 1, 3, 4, 5, 6, 7, 8}

이 배열은 두번째 요소부터는 정렬은 되어 있지만 버전 3의 버블 정렬 알고리즘을 사용
해도 빠른 시간 안에 정렬 작업을 마칠 수는 없습니다. 왜냐하면 맨 앞에 있는 요소의
값(9)은 1회의 패스틀 거쳐도 한 칸만 뒤로 옳겨지기 때문입니다. 그래서 홀수 번째의
패스는 가장 작은 요소를 맨 앞으로 옮기고 짝수 번째 패스는 가장 큰 요소를 맨 뒤로
옮기는 방식을 사용하면(패스의 스캔 방향을 교대로 바꾸면) 이런 정렬을 더 적은 횟수
로 비교를 수행할 수 있습니다. 버전 3의 프로그램을 개선하여 양방향 버블 정렬을 수행
하는 프로그램을 작성하세요.
버블 정렬을 개선한 이 알고리즘은 양방향 버블 정렬 (bidirection bubble sort) 또는
칵테일 정렬 (cocktail sort), 셰이커 정렬 (shaker sort)이라는 이름으로 알려져 있습
니다.
*/
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 양방향 버블 정렬 함수
void bubble(int a[], int n) {
    int c_count = 0;  // 비교 횟수
    int s_count = 0;  // 교환 횟수
    int p_count = 1;

    int left = 0;  // a[k]보다 앞쪽의 요소는 정렬을 마친 상태입니다.
    int right = n - 1;
    int last = right;
    while (left < right) {
        int j, k;
        printf("패스 %d: (홀수번째)\n", p_count++);
        for (j = right; j > left; j--) {
            // 숫자 출력 1
            for (k = 0; k < j - 1; k++)
                printf("%d ", a[k]);
            if (a[j - 1] > a[j]) {
                printf("%d+%d ", a[j - 1], a[j]);
                swap(int, a[j - 1], a[j]);
                s_count++;
                last = j;
            } else
                printf("%d-%d ", a[j - 1], a[j]);
            // 숫자 출력 2
            for (k = j + 1; k < n; k++)
                printf("%d ", a[k]);
            printf("\n");
            c_count++;
        }
        left = last;

        if (left >= right) break;  // 종료 시점 확인 (짝수번째 실행하지 않도록 추가)
        printf("\n패스 %d: (짝수번째)\n", p_count++);
        for (j = left; j < right; j++) {
            // 숫자 출력 1
            for (k = 0; k < j; k++)
                printf("%d ", a[k]);
            if (a[j] > a[j + 1]) {
                printf("%d+%d ", a[j], a[j + 1]);
                swap(int, a[j], a[j + 1]);
                s_count++;
                last = j;
            } else
                printf("%d-%d ", a[j], a[j + 1]);
            // 숫자 출력 2
            for (k = j + 2; k < n; k++)
                printf("%d ", a[k]);
            printf("\n");
            c_count++;
        }
        printf("\n");
        right = last;
    }
    printf("\n비교를 %d회 했습니다.\n", c_count);
    printf("교환을 %d회 했습니다.\n", s_count);
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("버블 정렬 (버전 4: 양방향 버블 정렬을 진행합니다.)");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성

    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }
    printf("\n");

    bubble(x, nx);  // 배열 x를 버블 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}
