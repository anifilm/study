// 입력받은 정수 값의 부호(양수/음수/0)를 판단
#include <stdio.h>

int main() {

    int n;

    printf("정수를 입력하시오: ");
    scanf("%d", &n);

    if (n == 1)
        printf("1 입니다.\n");
    else if (n == 2)
        printf("2 입니다.\n");
    else if (n == 3)
        printf("3 입니다.\n");

    return 0;
}
