// 1, 2, ..., n의 합을 구합니다. (while문)
#include <stdio.h>

int main() {

    puts("1부터 n까지의 합을 구합니다.");

    int n;
    printf("n의 값: ");
    scanf("%d", &n);

    int sum = 0;
    int i = 1;
    while (i <= n) {    // i가 n 이하이면 반복합니다.
        sum += i;       // sum에 i를 더합니다.
        i++;            // i값을 1 증가 시킵니다.
    }

    printf("1부터 %d까지의 합은 %d 입니다.\n", n, sum);

    return 0;
}
