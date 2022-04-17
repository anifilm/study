/* Q8
요소의 삽입 과정을 자세하게 출력할 수 있도록 단순 삽입 정렬 프로그램을 수정
하세요. 오른쪽처럼 현재 선택한 요소 아래에 기호 +, 삽입하는 위치의 요소 아래에
기호 ^, 그 사이에 기호 -를 출력하세요. 삽입하지 않는 (요소의 이동이 필요없는)
경우에는 선택한 요소 아래에 +만 출력하면 됩니다.
  6  4  8  5  2  9  7
  +
  6  4  8  5  2  9  7
 ^---+
  4  6  8  5  2  9  7
        +
  4  6  8  5  2  9  7
    ^------+
  4  5  6  8  2  9  7
 ^------------+
  ...이하 생략...
*/
#include <stdio.h>
#include <stdlib.h>

// 단순 삽입 정렬 함수
void insertion(int a[], int n) {
    int i, j, k;
    for (i = 0; i < n; i++) {
        // 숫자 출력
        for (k = 0; k < n; k++)
        printf(" %d ", a[k]);
        printf("\n");

        int tmp = a[i];
        for (j = i; j > 0 && a[j - 1] > tmp; j--)
            a[j] = a[j - 1];
        a[j] = tmp;

        // 기호 출력
        printf("%*s%s", 3 * j, "", (i != j) ? "^" : " ");
        for (k = 0; k < 3 * (i - j); k++)
            printf("-");
        printf("+\n");
    }
    // 숫자 출력 (정렬 완료)
    for (k = 0; k < n; k++)
    printf(" %d ", a[k]);
    printf("\n");
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
    printf("\n");

    insertion(x, nx);  // 배열 x를 단순 삽입 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}
