/* Q2
오른쪽처럼 선형 검색의 스캐닝 과정을 상세하게 표시하는 프로그램을 작성하세요.
이때 각 행의 맨 왼쪽에 현재 검색하는 요소의 인덱스를 표시하고, 현재 검색하고 있는 요소 위에 별표 기호 (*)를 표시하세요.
*/
#include <stdio.h>
#include <stdlib.h>

// 요소의 개수가 n인 배열 a에서 key와 일치하는 요소를 선형 검색 (버전2: for문)
int search(const int a[], int n, int key) {
    int i, j;
    printf("\n   |");
    for (i = 0; i < n; i++)
        printf("%3d ", i);
    printf("\n");

    printf("---+");
    for (i = 0; i < n; i++)
        printf("----");
    printf("\n");

    for (i = 0; i < n; i++) {
        printf("   |");
        for (j = 0; j < i; j++)
            printf("    ");
        printf("  * ");
        printf("\n");
        printf("%2d |", i);
        for (j = 0; j < n; j++)
            printf("%3d ", a[j]);
        printf("\n");
        if (a[i] == key)
            return i;   // 검색 성공
    }
    return -1;          // 검색 실패
}

int main() {

    int i, nx, ky, idx;
    int* x;                 // 배열의 첫번째 요소에 대한 포인터

    puts("선형 검색 (버전2: for문)");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성
    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }
    printf("검색값: ");
    scanf("%d", &ky);

    idx = search(x, nx, ky);        // 배열 x의 값이 ky인 요소를 선형 검색
    if (idx == -1)
        puts("\n해당 값을 찾을 수 없습니다.");
    else
        printf("\n%d(은)는 x[%d]에 있습니다.\n", ky, idx);
    free(x);        // 배열 해제

    return 0;
}
