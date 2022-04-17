/* Q1
재귀 함수 호출을 사용하지 않고 factorial 함수를 작성하세요.
*/
#include <stdio.h>

// 정수의 n의 순차곱셈 값을 반환
int factorial(int n) {
    /*
    int i, result = 1;
    for (i = 2; i <= n; i++)
        result *= i;
    return result;
    */
    int fact = 1;
    while (n > 1)
        fact *= n--;
    return fact;
}

int main() {

    int x;

    printf("정수를 입력하세요: ");
    scanf("%d", &x);
    printf("%d의 순차곱셈 값은 %d 입니다.\n", x, factorial(x));

    return 0;
}
