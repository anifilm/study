/* Q5
중앙값을 구하는 함수는 다음과 같이 작성할 수도 있습니다.
그러나 실습 1C-1의 med3함수에 비해 효율이 떨어지는데, 그 이유를 설명하세요.
*/
#include <stdio.h>

// a, b, c의 중앙값을 구합니다.
int med3(int a, int b, int c) {
    if ((b >= a && c <= a) || (b <= a && c >= a))
        return a;
    else if ((a > b && c < b) || (a < b && c > b))
        return b;
    return c;
}

int main() {

    int a, b, c;

    printf("세 정수의 중앙값을 구합니다.\n");
    printf("a의 값: "); scanf("%d", &a);
    printf("b의 값: "); scanf("%d", &b);
    printf("c의 값: "); scanf("%d", &c);

    printf("중앙값은 %d 입니다.\n", med3(a, b, c));
/*
    printf("med(%d, %d, %d) = %d\n", 3, 2, 1, med3(3, 2, 1));     // a > b > c
    printf("med(%d, %d, %d) = %d\n", 3, 2, 2, med3(3, 2, 2));     // a > b = c
    printf("med(%d, %d, %d) = %d\n", 3, 1, 2, med3(3, 1, 2));     // a > c > b
    printf("med(%d, %d, %d) = %d\n", 3, 2, 3, med3(3, 2, 3));     // a = c > b 오류
    printf("med(%d, %d, %d) = %d\n", 2, 1, 3, med3(2, 1, 3));     // c > a > b
    printf("med(%d, %d, %d) = %d\n", 3, 3, 2, med3(3, 3, 2));     // a = b > c 오류
    printf("med(%d, %d, %d) = %d\n", 3, 3, 3, med3(3, 3, 3));     // a = b = c
    printf("med(%d, %d, %d) = %d\n", 2, 2, 3, med3(2, 2, 3));     // c > a = b
    printf("med(%d, %d, %d) = %d\n", 2, 3, 1, med3(2, 3, 1));     // b > a > c
    printf("med(%d, %d, %d) = %d\n", 2, 3, 2, med3(2, 3, 2));     // b > a = c
    printf("med(%d, %d, %d) = %d\n", 1, 3, 2, med3(1, 3, 2));     // b > c > a
    printf("med(%d, %d, %d) = %d\n", 2, 3, 3, med3(2, 3, 3));     // b = c > a 오류
    printf("med(%d, %d, %d) = %d\n", 1, 2, 3, med3(1, 2, 3));     // c > b > a
*/
    return 0;
}
