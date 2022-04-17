// 배열 요소의 최대값을 구합니다. (값을 난수로 생성)
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

// 요소 개수가 n인 배열 a의 요소의 최대값을 구합니다.
int maxof(const int a[], int n) {
    int i;
    int max = a[0];     // 최대값
    for (i = 1; i < n; i++)
        if (a[i] > max) max = a[i];
    return max;
}

int main() {

    int i;
    int* height;        // 배열의 첫번째 요소의 포인터
    int number;         // 사람수 = 배열 height의 요소 개수
    printf("사람 수: ");
    scanf("%d", &number);
    height = (int*)calloc(number, sizeof(int));   // 요소 개수가 number인 배열을 생성
    srand(time(NULL));            // 시간으로 난수의 seed 값을 초기화
    for (i = 0; i < number; i++) {
        height[i] = 100 + rand() % 90;      // 100 ~ 189의 난수를 생성, 대입
        printf("height[%d] = %d\n", i, height[i]);
    }
    printf("최대값은 %d 입니다.\n", maxof(height, number));
    free(height);   // 배열 height를 해제

    return 0;
}
