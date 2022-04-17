// 왼쪽 아래가 직각인 이등변 삼각형을 출력합니다.
#include <stdio.h>

int main() {

    int i, j, n;
    do {
        printf("몇 단 삼각형입니까?: ");
        scanf("%d", &n);    // 단의 수로 양수를 입력합니다.
    } while (n <= 0);

    for (i = 1; i <= n; i++) {
        for (j = 1; j <= i; j++)
            putchar('*');
        putchar('\n');
    }

    return 0;
}
