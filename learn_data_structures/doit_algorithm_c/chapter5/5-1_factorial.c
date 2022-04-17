// 순차곱셈의 결과를 재귀적으로 구합니다.
#include <stdio.h>

// 정수의 n의 순차곱셈 값을 반환
int factorial(int n) {
    if (n > 0)
        return n * factorial(n - 1);
    else
        return 1;
}

int main() {

    int x;

    printf("정수를 입력하세요: ");
    scanf("%d", &x);
    printf("%d의 순차곱셈 값은 %d 입니다.\n", x, factorial(x));

    return 0;
}