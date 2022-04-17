/* Q7
실습 1-5 프로그램을 참고하여 n이 7이면 '1 + 2 + 3 + 4 + 5 + 6 + 7 = 28'로 출력하는
프로그램을 작성하세요.
*/
#include <stdio.h>

int main() {

    puts("1부터 n까지의 합을 구합니다.");

    int n;
    printf("n의 값: %d\n", n);
    scanf("%d", &n);

    int sum = 0;
    for (int i = 1; i <= n; i++) {  // i = 1, 2, ..., n
        sum += i;                   // sum에 i를 더합니다.

        if (n == 7)
            if (i < 7)
                printf("%d + ", i);
            else
                printf("%d ", i);
    }

    if (n == 7)
        printf("= %d\n", sum);
    else
        printf("1부터 %d까지의 합은 %d 입니다.\n", n, sum);

    return 0;
}
