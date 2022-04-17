/* Q12
오른쪽과 같이 위쪽과 왼쪽에 곱하는 수가 있는 곱셈표를 출력하는 프로그램을 작성하세요.
구분선은 수직선 기호(|), 마이너스 기호(-), 플러스 기호(+)를 사용하세요.
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
            printf("% 3d", i * j);
        c++;
        putchar('\n');
    }

    return 0;
}
