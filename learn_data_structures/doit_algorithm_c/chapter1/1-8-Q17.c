/* Q17
n단의 피라미드를 출력하는 함수를 작성하시오 (오른쪽은 4단의 예)
  void spira(int n);

i행에는 (i - 1) * 2 + 1개의 기호 문자 *를 출력하시오
(마지막 n 행은 (n - 1) * 2 + 1)개의 기호문자 *를 출력하게 됩니다.
*/
#include <stdio.h>

void spira(int n) {
    int i, j, k;
    for (i = 1; i <= n; i++) {
        for (j = 1; j <= n; j++) {
            if (j > n - i)
                putchar('*');
            else
                putchar(' ');
        }
        for (k = 1; k <= i - 1; k++)
            putchar('*');
        putchar('\n');
    }
}

int main() {

    int n;
    do {
        printf("몇 단 삼각형입니까?: ");
        scanf("%d", &n);    // 단의 수로 양수를 입력합니다.
    } while (n <= 0);

    spira(n);

    return 0;
}
