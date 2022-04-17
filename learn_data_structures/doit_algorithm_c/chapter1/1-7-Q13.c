/* Q13
곱셈이 아니라 덧셈을 출력하는 프로그램을 작성하세요.
앞 문제처럼 표의 위쪽과 왼쪽에 더하는 수를 출력하세요.
*/
#include <stdio.h>

int main() {

    int r, c, i, j;

    printf("  |");
    for (r = 1; r <= 9; r++) {
        printf("% 3d", r);
    }
    putchar('\n');

    printf("--+");
    for (r = 1; r <= 9; r++) {
        printf("---");
    }
    putchar('\n');

    c = 1;

    for (i = 1; i <= 9; i++) {
        printf("%d |", c);
        for (j = 1; j <= 9; j++)
            printf("% 3d", i + j);
        c++;
        putchar('\n');
    }

    return 0;
}
