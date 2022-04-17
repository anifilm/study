/* Q9
정수 a, b를 포함하여 그 사이의 모든 정수의 합을 구하는 아래 함수를 작성하세요.
  int sumof(int a, int b);
*/
#include <stdio.h>

int sumof(int a, int b) {
    int s, e;
    int sum = 0;

    if (a > b) {
        s = b;
        e = a;
    } else {
        s = a;
        e = b;
    }

    for (; s <= e; s++) {
        sum += s;
    }
    return sum;
 }

int main() {

    puts("a부터 b까지의 합을 구합니다.");

    int a, b;
    printf("a의 값: %d\n", a); scanf("%d", &a);
    printf("b의 값: %d\n", b); scanf("%d", &b);

    int sum = sumof(a, b);
    int s, e;
    if (a > b) {
        s = b;
        e = a;
    } else {
        s = a;
        e = b;
    }

    printf("%d부터 %d까지의 합은 %d 입니다.\n", s, e, sum);

    return 0;
}
