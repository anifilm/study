/* Q3
배열 a의 모든 요소의 최대공약수를 구하는 다음 함수를 작성하세요.
  int gcd_array(const int a[], int n);
*/
#include <stdio.h>
#include <stdlib.h>

// 정수 x, y의 최대공약수를 반환
int gcd(int x, int y) {
    if (y == 0)
        return x;
    else
        return gcd(y, x % y);
}

// 요소수 n인 배열 a의 모든 요소의 최대 공약수를 구합니다.
int gcd_array(const int a[], int n) {
    if (n == 1)
        return (a[0]);
    else if (n == 2)
        return gcd(a[0], a[1]);
    else
        return gcd(a[0], gcd_array(&a[1], n - 1));
}

int main() {

    int i, nx;
    int* x;     // 배열의 첫번째 요소에 대한 포인터

    printf("요소의 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));      // 요소수가 nx인 int형 배열을 생성

    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }
    printf("최대공약수는 %d 입니다.\n", gcd_array(x, nx));

    free(x);
    return 0;
}
