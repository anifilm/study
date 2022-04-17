// 입력받은 정수 값의 부호(양수/음수/0)를 판단
#include <stdio.h>

int main() {

    int n;

    printf("정수를 입력하시오: ");
    scanf("%d", &n);

    if (n > 0)
        printf("이 수는 양수 입니다.\n");
    else if (n < 0)
        printf("이 수는 음수 입니다.\n");
    else
        printf("이 수는 0 입니다.\n");

    return 0;
}
