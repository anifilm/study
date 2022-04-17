/* Q5
오른쪽처럼 배열 요소를 역순으로 정렬하는 과정을 일일이 출력하도록
실습 2-7을 수정한 프로그램을 작성하세요.
*/
#include <stdio.h>
#include <stdlib.h>

// type형 x와 y 값을 교환
#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 요소 개수가 n인 배열 a의 요소를 역순으로 정렬
void ary_reverse(int a[], int n) {
    int i, j;

    // 최초 정렬 내용을 출력
    for (i = 0; i < n; i++)
        printf("%d ", a[i]);
    printf("\n");

    for (i = 0; i < n / 2; i++) {
        printf("a[%d]와 a[%d]를 교환합니다.\n", i, n - i - 1);
        swap(int, a[i], a[n - i - 1]);
        // 교환 이후 정렬 내용을 출력
        for (j = 0; j < n; j++)
            printf("%d ", a[j]);
        printf("\n");
    }
    printf("역순 정렬을 종료합니다.\n");
}

int main() {

    int i;
    int* x;         // 배열의 첫번째 요소의 포인터
    int nx;         // 배열 x의 요소 개수

    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));   // 요소 개수가 nx인 int형 배열 x를 생성

    printf("%d 개의 정수를 입력하세요.\n", nx);
    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }

    ary_reverse(x, nx);     // 배열 x의 요소를 역순으로 정렬
    free(x);   // 배열 x를 해제

    return 0;
}
