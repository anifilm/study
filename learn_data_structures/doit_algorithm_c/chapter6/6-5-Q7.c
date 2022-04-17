/* Q7
요소의 교환 과정을 자세하게 출력할 수 있도록 단순 선택 정렬 프로그램을 수정
하세요. 오른쪽처럼 정렬하지 않은 부분의 첫번째 요소 위에는 기호 *를, 정렬하지 않은
부분의 가장 작은 값의 요소 위에는 기호 +를 출력하세요.
이 문제는 6-4절의 '단순 선택 정렬' 프로그램을 개선하는 연습문제 입니다.
  *       +
  6 4 8 3 1 9 7
    *   +
  1 4 8 3 6 9 7
      * +
  1 3 8 4 6 9 7
  ...이하 생략...
*/
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 단순 선택 정렬 함수
void selection(int a[], int n) {
    int i, j, k;
    for (i = 0; i < n - 1; i++) {
        int min = i;  // 아직 정렬되지 않은 부분에서 가장 작은 요소의 인덱스를 기록
        for (j = i + 1; j < n; j++) {
            if (a[j] < a[min])
                min = j;
        }

        // 교환 과정 출력
        for (k = 0; k < n; k++) {
            if (a[i] == a[k])
                printf(" * ");
            else if (a[min] == a[k])
                printf(" + ");
            else
                printf("   ");
        }
        printf("\n");
        for (k = 0; k < n; k++)
            printf(" %d ", a[k]);
        printf("\n");

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
    printf("\n");

    selection(x, nx);  // 배열 x를 단순 선택 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}
