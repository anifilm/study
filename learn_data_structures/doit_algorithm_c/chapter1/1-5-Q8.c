/* Q8
1부터 10까지의 합은 (1 + 10) * 5와 같은 방법으로 구할 수 있습니다.
가우스 덧셈이라는 이 방법을 이용하여 1부터 n까지의 정수 합을 구하는 프로그램을 작성하세요.
*/
#include <stdio.h>

int main() {

    puts("1부터 n까지의 합을 구합니다.");

    int n;
    printf("n의 값: %d\n", n);
    scanf("%d", &n);

    int sum = (1 + n) * 5;

    printf("1부터 %d까지의 합은 %d 입니다.\n", n, sum);

    return 0;
}
