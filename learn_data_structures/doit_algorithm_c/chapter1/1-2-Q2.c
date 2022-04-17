/* Q2
세 값의 최소값을 구하는 min3 함수를 작성하세요.
  int min3(int a, int b, int c);
*/
#include <stdio.h>

// a, b, c의 최소값을 구합니다.
int min3(int a, int b, int c) {
    int min = a;
    if (b < min) min = b;
    if (c < min) min = c;
    return min;
}

int main() {

    printf("min(%d, %d, %d) = %d\n", 3, 2, 1, min3(3, 2, 1));
    printf("min(%d, %d, %d) = %d\n", 3, 2, 2, min3(3, 2, 2));
    printf("min(%d, %d, %d) = %d\n", 3, 1, 2, min3(3, 1, 2));

    return 0;
}
