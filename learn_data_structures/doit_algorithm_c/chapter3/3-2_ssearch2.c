// 선형 검색
#include <stdio.h>
#include <stdlib.h>

// 요소의 개수가 n인 배열 a에서 key와 일치하는 요소를 선형 검색 (버전2: for문)
int search(const int a[], int n, int key) {
    int i;
    for (i = 0; i < n; i++)
        if (a[i] == key)
            return i;   // 검색 성공
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

    printf("배열 x의 입력 내용 확인\n");
    printf("{ ");
    for (i = 0; i < nx; i++)
        printf("%d ", x[i]);
    printf("}\n");

    idx = search(x, nx, ky);        // 배열 x의 값이 ky인 요소를 선형 검색
    if (idx == -1)
        puts("해당 값을 찾을 수 없습니다.");
    else
        printf("%d(은)는 x[%d]에 있습니다.\n", ky, idx);
    free(x);        // 배열 해제

    return 0;
}
