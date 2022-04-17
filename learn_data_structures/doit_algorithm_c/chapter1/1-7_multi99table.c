// 곱셈표를 출력합니다.
#include <stdio.h>

int main() {

    printf("\t\t----- 곱셈표 -----\n");

    int i, j;
    for (i = 1; i <= 9; i++) {
        for (j = 1; j <= 9; j++)
            printf("% 3d", i * j);
        putchar('\n');
    }

    return 0;
}
