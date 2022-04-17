/* Q2
앞의 문제(실습 2-5)를 수정하여 키의 합계를 구하는 프로그램을 작성하세요.
합계를 구하는 과정은 아래와 같은 함수로 구현하세요.
  int sumof(const int a[], int n);
*/
#include <stdio.h>
#include <stdlib.h>

// 요소 개수가 n인 배열 a의 요소의 합계를 구합니다.
int sumof(const int a[], int n) {
    int i;
    int sum = 0;
    for (i = 0; i < n; i++)
        sum += a[i];
    return sum;
}

int main() {

    int i;
    int* height;    // 배열의 첫번째 요소의 포인터
    int number;     // 인원 = 배열 height의 요소 개수
    printf("사람 수: ");
    scanf("%d", &number);
    height = (int*)calloc(number, sizeof(int));   // 요소 개수 number개인 배열을 생성
    printf("%d 사람의 키를 입력하세요.\n", number);
    for (i = 0; i < number; i++) {
        printf("height[%d]: ", i);
        scanf("%d", &height[i]);
    }
    printf("합계는 %d 입니다.\n", sumof(height, number));
    free(height);   // 배열 height를 해제

    return 0;
}
