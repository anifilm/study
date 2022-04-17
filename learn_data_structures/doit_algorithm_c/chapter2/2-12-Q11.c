/* Q11
dayofyear 함수를 변수 i와 days를 사용하지 않고 구현해 보세요.
또한 for문이 아닌 while문을 사용하세요.
*/
#include <stdio.h>

// 각 달의 일수
int mdays[][12] = {
        {31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31},
        {31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31},
};

// year 년이 윤년인가?
int isleap(int year) {
    return year % 4 == 0 && year % 100 != 0 || year % 400 == 0;
}

// y년 m월 d일의 그해 지난 일수를 구합니다.
int dayofyear(int y, int m, int d) {
    while (--m)
        d += mdays[isleap(y)][m - 1];

    return d;
}

int main() {

    int year, month, day;       // 년, 월, 일
    int retry;                  // 한번 더?

    do {
        printf("년: "); scanf("%d", &year);
        printf("월: "); scanf("%d", &month);
        printf("일: "); scanf("%d", &day);
        printf("%d년의 %d일째 입니다.\n", year, dayofyear(year, month, day));
        printf("한번 더 할까요? (1...예 / 0...아니오): ");
        scanf("%d", &retry);
    } while (retry == 1);

    return 0;
}
