/* Q16
직각 이등변 삼각형을 출력하는 부분을 아래와 같은 형식의 함수로 작성하세요.
  void triangleLB(int n);   // 왼쪽 아래가 직각인 이등변 삼각형을 출력

또 왼쪽 위, 오른쪽 위, 오른쪽 아래가 직각인 이등변 삼각형을 출력하는 함수를 작성하세요.
  void triangleLU(int n);   // 왼쪽 위가 직각인 이등변 삼각형을 출력
  void triangleRU(int n);   // 오른쪽 위가 직각인 이등변 삼각형을 출력
  void triangleRB(int n);   // 오른쪽 아래가 직각인 이등변 삼각형을 출력
*/
#include <stdio.h>

void triangleLB(int n) {
    int i, j;
    for (i = 1; i <= n; i++) {
        for (j = 1; j <= i; j++)
            putchar('*');
        putchar('\n');
    }
}

void triangleRB(int n) {
    int i, j;
    for (i = 1; i <= n; i++) {
        for (j = 1; j <= n; j++) {
            if (j > n - i)
                putchar('*');
            else
                putchar(' ');
        }
        putchar('\n');
    }
}

void triangleLU(int n) {
    int i, j;
    for (i = 1; i <= n; i++) {
        for (j = 1; j <= n; j++) {
            if (j <= n - i + 1)
                putchar('*');
        }
        putchar('\n');
    }
}

void triangleRU(int n) {
    int i, j;
    for (i = 1; i <= n; i++) {
        for (j = 1; j <= n; j++) {
            if (j <= i - 1)
                putchar(' ');
            else
                putchar('*');
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

    triangleLB(n);
    triangleRB(n);
    triangleLU(n);
    triangleRU(n);

    return 0;
}
