/* Q18
오른쪽과 같이 아래를 향한 n단의 숫자 피라미드를 출력하는 함수를 작성하세요.
  void nrpira(int n);

i행에 출력하는 숫자는 i % 10으로 구하세요.
*/
#include <stdio.h>

void nrpira(int n) {
    int i, j, k;
    for (i = 1; i <= n; i++) {
        for (j = 1; j <= n; j++) {
            if (j <= i - 1)
                putchar(' ');
            else
                printf("%d", i % 10);
        }
        for (k = 1; k <= n; k++) {
            if (k <= n - i)
                printf("%d", i % 10);
        }
        putchar('\n');
    }
}

int main() {

    int n;
    do {
        printf("몇 단 삼각형입니까?: ");
        scanf("%d", &n);    // 단의 수로 양수를 입력합니다.
    } while (n <= 0);

    nrpira(n);

    return 0;
}
