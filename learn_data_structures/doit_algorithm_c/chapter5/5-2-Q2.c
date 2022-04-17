/* Q2
재귀 함수 호출을 사용하지 않고 gcd 함수를 작성하세요.
*/
#include <stdio.h>

// 정수 x, y의 최대공약수를 반환
int gcd(int x, int y) {
    /*
    int i, j, result;
    for (i = 1; i <= x; i++) {
        for (j = 1; j <= y; j++) {
            if ((x % i == 0) && (y % j == 0)) {
                if (i == j) result = i;
            }
        }
    }
    return result;
    */
    int temp;
    while (y != 0) {
        temp = y;
        y = x % y;
        x = temp;
    }
    return x;
}

int main() {

    int x, y;

    puts("두 정수의 최대공약수를 구합니다.");
    printf("정수를 입력하세요: ");
    scanf("%d", &x);
    printf("정수를 입력하세요: ");
    scanf("%d", &y);
    printf("최대공약수는 %d 입니다.\n", gcd(x, y));

    return 0;
}
