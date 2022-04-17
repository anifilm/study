// 1, 2, ..., n의 합을 구합니다. (do문에서 양의 정수만을 n 값으로 입력합니다)
#include <stdio.h>

int main() {

    puts("1부터 n까지의 합을 구합니다.");

    int n;
    do {
        printf("n의 값: ");
        scanf("%d", &n);
    } while(n <= 0);    // n이 0보다 클 때까지 반복합니다.

    int sum = 0;
    for (int i = 1; i <= n; i++) {  // i = 1, 2, ..., n
        sum += i;                   // sum에 i를 더합니다.
    }

    printf("1부터 %d까지의 합은 %d 입니다.\n", n, sum);

    return 0;
}
