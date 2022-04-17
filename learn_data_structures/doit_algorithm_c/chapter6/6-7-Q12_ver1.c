/* Q12
요소의 이동 횟수를 계산할 수 있도록 버전 1과 버전 2를 수정한 프로그램을 작성
하세요. 여러 가지 배열을 입력하고 프로그램을 실행하여 이동 횟수를 비교해 보세요.
*/
#include <stdio.h>
#include <stdlib.h>

// 셀 정렬 함수
int shell(int a[], int n) {
    int i, j, h;
    int count = 0;
    for (h = n / 2; h > 0; h /= 2) {
        for (i = h; i < n; i++) {
            int tmp = a[i];
            for (j = i - h; j >= 0 && a[j] > tmp; j -= h) {
                a[j + h] = a[j];
                count++;
            }
            a[j + h] = tmp;
            count++;
        }
    }
    return count;
}

int main() {

    int i, nx, count;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("셀 정렬");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성

    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }

    count = shell(x, nx);  // 배열 x를 셀 정렬

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);
    printf("요소의 이동 횟수는 %d회 입니다.\n", count);

    free(x);        // 배열 해제
    return 0;
}
