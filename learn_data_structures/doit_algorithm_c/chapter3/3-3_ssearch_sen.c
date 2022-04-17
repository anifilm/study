// 선형 검색 (보초법, sentinel method)
#include <stdio.h>
#include <stdlib.h>

// 요소의 개수가 n인 배열 a에서 key와 일치하는 요소를 선형 검색 (보초법)
int search(int a[], int n, int key) {
    int i = 0;
    a[n] = key;         // 보초를 추가
    while (1) {
        if (a[i] == key)
            break;      // 원하는 키 값을 찾은 경우
        i++;
    }
    return i == n ? -1 : i;
}

int main() {

    int i, nx, ky, idx;
    int* x;                 // 배열의 첫번째 요소에 대한 포인터

    puts("선형 검색 (보초법)");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx + 1, sizeof(int));    // 요소의 개수가 (nx + 1)인 int형 배열을 생성
    for (i = 0; i < nx; i++) {      // 주의: 값을 읽어 들인 것은 nx개
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

/*

보초법
1. 검색값 key를 보초로 a[n]에 대입 (배열의 마지막에 보초를 저장)
2. 종료조건을 판단하는 if문이 필요없음 (반복 종료에 대한 판단 횟수는 실제로 절반)
3. 배열 요소를 순서대로 검사
4. while문에 의한 반복이 완료되면 찾은 값이 배열의 원래 데이터인지 아니면 보초인지 판단
5. 변수 i값이 n이면 찾은 값이 보초이므로 검색 실패, -1을 반환

*/
