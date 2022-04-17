// 재귀에 대해 깊이 이해하기 위한 재귀 함수
#include <stdio.h>

// 함수 recur(꼬리 재귀를 제거)
void recur(int n) {
Top:
    if (n > 0) {
        recur(n - 1);
        printf("%d ", n);
        // recur(n - 2);
        n = n - 2;
        goto Top;
    }
}

int main() {

    int x;

    printf("정수를 입력하세요: ");
    scanf("%d", &x);

    recur(x);

    return 0;
}
