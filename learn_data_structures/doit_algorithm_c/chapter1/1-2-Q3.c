/* Q3
네 값의 최소값을 구하는 min4 함수를 작성하세요.
  int min4(int a, int b, int c, int d);
*/
#include <stdio.h>

// a, b, c, d의 최소값을 구합니다.
int min4(int a, int b, int c, int d) {
    int min = a;
    if (b < min) min = b;
    if (c < min) min = c;
    if (d < min) min = d;
    return min;
}

int main() {

    printf("min(%d, %d, %d, %d) = %d\n", 3, 2, 1, 4, min4(3, 2, 1, 4));
    printf("min(%d, %d, %d, %d) = %d\n", 3, 2, 2, 1, min4(3, 2, 2, 1));
    printf("min(%d, %d, %d, %d) = %d\n", 3, 4, 2, 1, min4(3, 4, 2, 1));

    return 0;
}
