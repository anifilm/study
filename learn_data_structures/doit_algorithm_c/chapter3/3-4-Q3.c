/* Q3
요소의 개수가 n인 배열 a에서 key와 일치하는 모든 요소의 인덱스를 배열 idx의 맨 앞부터 순서대로 저장하고,
일치한 요소의 개수를 반환하는 함수를 작성하세요. 예를 들어, 요소의 개수가 8인 배열 a의 요소가
{ 1, 9, 2, 9, 4, 6, 7, 9 } 이고 key가 9면 배열 idx에 { 1, 3, 7 } 을 저장하고 3을 반환 합니다.
  int search_idx(const int a[], int n, int key, int idx[]);
*/
#include <stdio.h>
#include <stdlib.h>

// 배열 a에서 값이 key인 모든 요소의 인덱스를 idx에 저장
int search_idx(const int a[], int n, int key, int idx[]) {
    int i, count = 0;
    for (i = 0; i < n; i++)
        if (a[i] == key)
            idx[count++] = i;
    return count;
}

int main() {

    int i, nx, ky;
    int no;                     // ky와 일치하는 요소의 개수
    int* x;                     // 데이터를 저장하는 배열
    int* idx;                   // ky와 일치하는 요소의 인덱스를 저장하는 배열

    puts("선형 검색");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성
    idx = (int*)calloc(nx, sizeof(int));  // 요소의 개수가 nx인 int형 배열을 생성

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

    no = search_idx(x, nx, ky, idx);    // 배열 x의 값이 ky인 요소를 선형 검색
    if (no == -1)
        puts("해당 값을 찾을 수 없습니다.");
    else {
            printf("일치하는 요소는 %d개 입니다.\n", no);
        for (i = 0; i < no; i++)
            printf("X[%d] ", idx[i]);
        printf("\n");
    }
    free(x);        // 배열 해제
    free(idx);      // 배열 해제

    return 0;
}
