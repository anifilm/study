/* Q10
배열 a의 모든 요소의 순서를 뒤섞는 shuffle 함수를 작성하세요. (n은 요소 개수입니다.)
  void shuffle(int a[], int n);
*/
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

// type형 x와 y 값을 교환
#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 요소 개수가 n인 배열 a의 요소를 뒤섞는 함수
void shuffle(int a[], int n) {
    srand(time(NULL));
    for (int i = n - 1; i > 0; i--) {
        int j = rand() % (i + 1);
        if (i != j)
            swap(int, a[i], a[j]);
    }
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

    printf("\n배열 x의 입력 내용 확인\n");
    printf("{ ");
    for (i = 0; i < nx; i++)
        printf("%d ", x[i]);
    printf("}\n");

    shuffle(x, nx);     // 배열 x의 요소를 뒤섞어서 정렬
    printf("\n배열의 요소를 순서를 뒤섞었습니다.\n");

     // for (i = 0; i < nx; i++)
     //    printf("x[%d] = %d\n", i, x[i]);

    printf("배열 x의 변경 내용 확인\n");
    printf("{ ");
    for (i = 0; i < nx; i++)
        printf("%d ", x[i]);
    printf("}\n");

    free(x);   // 배열 x를 해제

    return 0;
}
