// 자료형이 int형이고 요소 개수가 5인 배열
#include <stdio.h>

#define N 5     // 배열의 요소 개수

int main() {

    int i;
    int a[N];   // 배열 선언

    for (i = 0; i < N; i++) {   // 각 요소에 값을 입력합니다.
        printf("a[%d]", i);
        scanf("%d", &a[i]);
    }

    puts("각 요소의 값");
    for (i = 0; i < N; i++) {   // 각 요소의 값을 출력합니다.
        printf("a[%d] = %d\n", i, a[i]);
    }

    return 0;
}
