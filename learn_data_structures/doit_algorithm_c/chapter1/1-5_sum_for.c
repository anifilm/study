// 1, 2, ..., n의 합을 구합니다. (for문)
#include <stdio.h>

int main() {

    puts("1부터 n까지의 합을 구합니다.");

    int n;
    printf("n의 값: ");
    scanf("%d", &n);

    int sum = 0;
    for (int i = 1; i <= n; i++) {  // i = 1, 2, ..., n
        sum += i;                   // sum에 i를 더합니다.
    }

    printf("1부터 %d까지의 합은 %d 입니다.\n", n, sum);

    return 0;
}
