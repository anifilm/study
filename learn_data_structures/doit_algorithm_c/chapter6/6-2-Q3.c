/* Q3
버블정렬(버전 2)의 아이디어는 배열이 정렬을 마쳤는지 검사하는 데 응용할 수 있습
니다. 전달받은 배열 a가 오름차순으로 정렬을 마쳤는지 검사하는 함수를 작성하세요.
이때 오름차순으로 정렬을 마친 상태라면 1, 그렇지 않으면 0을 반환하도록 작성하세요.
  int is_sorted(const int a[], int n);
*/
#include <stdio.h>
#include <stdlib.h>

#define swap(type, x, y) do { type t = x; x = y; y = t; } while (0)

// 오름차순으로 정렬을 마쳤는지 검사하는 함수
int is_sorted(const int a[], int n) {
    int i;
    for (i = n - 1; i > 0; i--)
        if (a[i - 1] > a[i])
            return 0;   // 교환이 이루어지면 0
    return 1;           // 더이상 교환이 없다면 1
}

// 버블 정렬 함수 2
void bubble(int a[], int n) {
    int i, j;
    for (i = 0; i < n - 1; i++) {
        for (j = n - 1; j > i; j--) {
            printf("%d %d\n", i, j);
            if (a[j - 1] > a[j]) {
                swap(int, a[j - 1], a[j]);
            }
        }
        // 교환이 수행되지 않았다면 정렬을 멈춥니다.
        if (is_sorted(a, n) == 1) {
            puts("정렬이 완료되어 교환을 멈춤니다.");
            break;
        }
    }
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("버블 정렬 (버전 2: 교환 횟수에 따라 정렬 작업을 멈춥니다.)");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성

    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }

    bubble(x, nx);  // 배열 x를 버블 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}
