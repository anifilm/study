// 재귀에 대해 깊이 이해하기 위한 재귀 함수
#include <stdio.h>
#include "5-5_IntStack.h"

// 재귀 호출을 제거한 recur 함수
void recur(int n) {
    IntStack stk;
    Initialize(&stk, 100);      // 스택

Top:
    if (n > 0) {
        // recur(n - 1);
        Push(&stk, n);          // n의 값을 푸시
        n = n - 1;
        goto Top;
    }
    if (!IsEmpty(&stk)) {       // 스택이 비어있지 않으면
        Pop(&stk, &n);          // 값을 저장했던 n을 팝
        printf("%d ", n);
        // recur(n - 2);
        n = n - 2;
        goto Top;
    }

    Terminate(&stk);
}

int main() {

    int x;

    printf("정수를 입력하세요: ");
    scanf("%d", &x);

    recur(x);

    return 0;
}
