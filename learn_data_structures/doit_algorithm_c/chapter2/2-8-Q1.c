/* Q1
실습 2-5는 키의 최대값을 구하는 프로그램으로, 이 프로그램을 수정하여 키의 최소값을 구하는 프로그램을 작성하세요.
최소값을 구하는 과정은 아래와 같은 함수로 구현하세요.
  int minof(const int a[], int n);
*/
#include <stdio.h>
#include <stdlib.h>

// 요소 개수가 n인 배열 a의 요소의 최소값을 구합니다.
int minof(const int a[], int n) {
    int i;
    int min = a[0];     // 최소값
    for (i = 0; i < n; i++)
        if (a[i] < min) min = a[i];
    return min;
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
    printf("최소값은 %d 입니다.\n", minof(height, number));
    free(height);   // 배열 height를 해제

    return 0;
}
