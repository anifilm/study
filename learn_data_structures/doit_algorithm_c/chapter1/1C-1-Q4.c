/* Q4
세 값의 대소 관계 13종류의 모든 조합에 대해 중앙값을 구하여 출력하는 프로그램을 작성하세요.
*/
#include <stdio.h>

// a, b, c의 중앙값을 구합니다.
int med3(int a, int b, int c) {
    if (a >= b) {
        if (a > b) {
            if (b >= c) {
                if (b > c) {
                    // a > b > c
                    printf("a > b > c -> ");
                    return b;
                } else {
                    // a > b = c
                    printf("a > b = c -> ");
                    return b;
                }
            } else if (a >= c) {
                if (a > c) {
                    // a > c > b
                    printf("a > c > b -> ");
                    return c;
                } else {
                    // a = c > b
                    printf("a = c > b -> ");
                    return a;
                }
            } else {
                // c > a > b
                printf("c > a > b -> ");
                return a;
            }
        } else if (b >= c) {
            if (b > c) {
                // a = b > c
                printf("a = b > c -> ");
                return a;
            } else {
                // a = b = c
                printf("a = b = c -> ");
                return a;
            }
        } else {
            // c > a = b
            printf("c > a = b -> ");
            return a;
        }
} else if (a >= c) {
        if (a > c) {
            // b > a > c
            printf("b > a > c -> ");
            return a;
        } else {
            // b > a = c
            printf("b > a = c -> ");
            return a;
        }
    } else if (b >= c) {
        if (b > c) {
            // b > c > a
            printf("b > c > a -> ");
            return c;
        } else {
            // b = c > a
            printf("b = c > a -> ");
            return b;
        }
    } else {
        // c > b > a
        printf("c > b > a -> ");
        return b;
    }
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
    printf("med(%d, %d, %d) = %d\n", 3, 2, 3, med3(3, 2, 3));     // a = c > b
    printf("med(%d, %d, %d) = %d\n", 2, 1, 3, med3(2, 1, 3));     // c > a > b
    printf("med(%d, %d, %d) = %d\n", 3, 3, 2, med3(3, 3, 2));     // a = b > c
    printf("med(%d, %d, %d) = %d\n", 3, 3, 3, med3(3, 3, 3));     // a = b = c
    printf("med(%d, %d, %d) = %d\n", 2, 2, 3, med3(2, 2, 3));     // c > a = b
    printf("med(%d, %d, %d) = %d\n", 2, 3, 1, med3(2, 3, 1));     // b > a > c
    printf("med(%d, %d, %d) = %d\n", 2, 3, 2, med3(2, 3, 2));     // b > a = c
    printf("med(%d, %d, %d) = %d\n", 1, 3, 2, med3(1, 3, 2));     // b > c > a
    printf("med(%d, %d, %d) = %d\n", 2, 3, 3, med3(2, 3, 3));     // b = c > a
    printf("med(%d, %d, %d) = %d\n", 1, 2, 3, med3(1, 2, 3));     // c > b > a
*/
    return 0;
}
