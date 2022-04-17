/* Q8
배열 b의 모든 요소를 배열 a에 복사하는 함수를 작성하세요. (n은 요소 개수입니다.)
  void ary_copy(int a[], const int b[], int n);
*/
#include <stdio.h>
#include <stdlib.h>

// 배열 b의 모든 요소를 배열 a에 복사하는 함수
void ary_copy(int a[], const int b[], int n) {
    for (int i = 0; i < n; i++)
        a[i] = b[i];
}

int main() {

    int i;
    int *x, *y;     // 배열의 첫번째 요소의 포인터
    int nx;         // 배열 x의 요소 개수

    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));   // 요소 개수가 nx인 int형 배열 x를 생성
    y = (int*)calloc(nx, sizeof(int));   // 요소 개수가 nx인 int형 배열 y를 생성

    printf("%d 개의 정수를 입력하세요.\n", nx);
    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }

    printf("\n배열 x의 입력 내용 확인\n");
    printf("{ ");
    for (i = 0; i < nx; i++)
        printf("%d ", x[i]);
    printf("}\n");

    ary_copy(y, x, nx);     // 배열 x의 요소를 배열 y로 복사
    printf("\n배열 x의 모든 요소를 배열 y로 복사 했습니다.\n");

    printf("배열 y의 복사된 내용 확인\n");
    printf("{ ");
    for (i = 0; i < nx; i++)
        printf("%d ", y[i]);
    printf("}\n");

    free(x);    // 배열 x를 해제
    free(y);    // 배열 y를 해제

    return 0;
}
