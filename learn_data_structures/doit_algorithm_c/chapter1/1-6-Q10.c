/* Q10
오른쪽과 같이 두 변수 a, b에 정수를 입력하고 b - a 를 출력하는 프로그램을 작성하세요.
단, 변수 b에 입력한 값이 a 이하이면 변수 b의 값을 다시 입력 받으시오.
*/
#include <stdio.h>

int main() {

    int a, b;

    printf("a의 값: ");
    scanf("%d", &a);

    do {
        printf("b의 값: ");
        scanf("%d", &b);
        if (a >= b)
            printf("a보다 큰 값을 입력하세요!\n");
    } while(a >= b);

    printf("b - a 는 %d 입니다.\n", b - a);

    return 0;
}
