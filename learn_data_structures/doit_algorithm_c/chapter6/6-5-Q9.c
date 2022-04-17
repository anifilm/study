/* Q9
단순 삽입 정렬에서 배열의 첫번째 요소 (a[0])부터 데이터를 저장하지 않고 a[1]
부터 데이터를 저장하면 a[0]을 보초로 하여 삽입을 마치는 조건을 줄일 수 있습니다.
이 아이디어를 적용한 단순 삽입 정렬 함수를 수정하세요.
*/
#include <stdio.h>
#include <stdlib.h>

// 단순 삽입 정렬 함수 (a[0]을 보초로 사용)
void insertion(int a[], int n) {
    int i, j;
    for (i = 1; i < n; i++) {
        int tmp = a[0] = a[i];
        for (j = i; a[j - 1] > tmp; j--)
            a[j] = a[j - 1];
        if (j) a[j] = tmp;
    }
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("단순 삽입 정렬 (a[0]을 보초로 사용)");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx + 1, sizeof(int));  // a[0]를 보초로 사용하기 때문에 nx + 1개의 배열을 생성

    for (i = 1; i < nx + 1; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }
    printf("\n");

    insertion(x, nx + 1);  // 배열 x를 단순 삽입 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 1; i < nx + 1; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}
