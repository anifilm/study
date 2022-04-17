/* Q5
우리가 살펴본 이진 검색 알고리즘 프로그램은 검색할 값과 같은 값을 갖는 요소가 하나 이상일 경우
그 요소 중에서 맨 앞의 요소를 찾지 못합니다. 예를 들어, 아래 그림의 배열에서 7을 검색하면
중앙에 위치하는 a[5]를 검색합니다. 맨 앞의 요소를 찾는 bin_search2 함수를 작성해보세요.
  int bin_search2(const int a[], int n, int key);

이진 검색 알고리즘에 의해 검색에 성공했을 때([a]) 그 위치로 부터 앞쪽으로 하나씩 검사하면 ([b])
여러 요소가 일치하는 경우에도 가장 앞쪽에 위치하는 요소의 인덱스를 찾아냅니다.
*/
#include <stdio.h>
#include <stdlib.h>

// 요소의 개수가 n인 배열 a에서 key와 일치하는 요소를 이진 검색 (가장 앞쪽에 있는 요소를 검색)
int bin_search2(const int a[], int n, int key) {
    int pl = 0;                 // 검색 범위 맨 앞의 인덱스
    int pr = n - 1;             // 검색 범위 맨 끝의 인덱스 (요소 개수 - 1)
    int pc;                     // 검색 범위 한가운데의 인덱스 (앞 인덱스 + 맨끝 인덱스) / 2
    do {
        pc = (pl + pr) / 2;
        if (a[pc] == key) {     // 중앙값과 검색값이 같으면
            while (pc > pl && a[pc - 1] == key) // 시작 인덱스가 중앙값 보다 크고 중앙값 - 1 인덱스의 값이 검색값과 같으면
                pc--;           // 중앙값을 한칸 앞의 인덱스로 수정
            return pc;          // 중앙값 (검색 성공)
        } else if (a[pc] < key) // 중앙값보다 검색값이 크다면
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
            if (x[i] < x[i - 1])
                printf("%d보다 크거나 같은 값을 입력하세요.\n", x[i-1]);
        } while (x[i] < x[i - 1]);  // 바로 앞의 값보다 작으면 다시 입력하도록 함
    }
    printf("검색값: ");
    scanf("%d", &ky);

    printf("배열 x의 입력 내용 확인\n");
    printf("{ ");
    for (i = 0; i < nx; i++)
        printf("%d ", x[i]);
    printf("}\n");

    idx = bin_search2(x, nx, ky);    // 배열 x의 값이 ky인 요소를 이진 검색
    if (idx == -1)
        puts("해당 값을 찾을 수 없습니다.");
    else
        printf("%d(은)는 x[%d]에 있습니다.\n", ky, idx);
    free(x);        // 배열 해제

    return 0;
}
