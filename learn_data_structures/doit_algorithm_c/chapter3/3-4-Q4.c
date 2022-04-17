/* Q4
오른쪽처럼 이진 검색의 과정을 자세히 출력하는 프로그램을 작성하세요. 각 행의 맨 왼쪽에 현재 검색하고
있는 요소의 인덱스를 출력하고, 검색 범위의 맨 앞 요소 위에 <-, 맨 끝 요소 위에 ->, 현재 검색하고
있는 중앙 요소 위에 +를 출력하세요.
*/
#include <stdio.h>
#include <stdlib.h>

// 요소의 개수가 n인 배열 a에서 key와 일치하는 요소를 이진 검색
int bin_search(const int a[], int n, int key) {
    int i, j;
    int pl = 0;                 // 검색 범위 맨 앞의 인덱스
    int pr = n - 1;             // 검색 범위 맨 끝의 인덱스 (요소 개수 - 1)
    int pc;                     // 검색 범위 한가운데의 인덱스 (앞 인덱스 + 맨끝 인덱스) / 2

    printf("\n   |");
    for (i = 0; i < n; i++)
        printf("%3d ", i);
    printf("\n");

    printf("---+");
    for (i = 0; i < n; i++)
        printf("----");
    printf("\n");



    do {
        pc = (pl + pr) / 2;

        printf("   |");
        for (j = 0; j < n; j++)
            if (j == pc)
            printf("  + ");
            else if (j == pl)
                printf(" <- ");
            else if (j == pr)
                printf("  ->");
            else
                printf("    ");
        printf("\n");

        printf("%2d |", pc);
        for (j = 0; j < n; j++)
            printf("%3d ", a[j]);
        printf("\n");

        if (a[pc] == key)       // 중앙값과 검색값이 같으면
            return pc;          // 중앙값 (검색 성공)
        else if (a[pc] < key)   // 중앙값보다 검색값이 크다면
            pl = pc + 1;        // 시작 인덱스를 중앙값 + 1 로 설정
        else                    // 중앙값보다 검색값이 작다면
            pr = pc - 1;        //  끝 인덱스를 중앙값 - 1 로 설정
    } while (pl <= pr);         // 시작 인덱스와 끝 인덱스가 같아지면
    return -1;                  // 검색 실패
}

int main() {

    int i, nx, ky, idx;
    int* x;                 // 배열의 첫번째 요소에 대한 포인터

    puts("이진 검색");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성
    printf("오름차순으로 입력하세요.\n");
    printf("x[0]: ");
    scanf("%d", &x[0]);
    for (i = 1; i < nx; i++) {
        do {
            printf("x[%d]: ", i);
            scanf("%d", &x[i]);
            if (x[i] <= x[i - 1])
                printf("%d보다 큰 값을 입력하세요.\n", x[i-1]);
        } while (x[i] <= x[i - 1]);  // 바로 앞의 값보다 작으면 다시 입력하도록 함
    }
    printf("검색값: ");
    scanf("%d", &ky);

    idx = bin_search(x, nx, ky);    // 배열 x의 값이 ky인 요소를 이진 검색
    if (idx == -1)
        puts("\n해당 값을 찾을 수 없습니다.");
    else
        printf("\n%d(은)는 x[%d]에 있습니다.\n", ky, idx);
    free(x);        // 배열 해제

    return 0;
}
