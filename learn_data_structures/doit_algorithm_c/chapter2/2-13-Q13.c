/* Q13
날짜를 나타내는 구조체가 오른쪽 처럼 주어져 있습니다. 아래의 함수를 작성하세요.
1. y년 m월 d일을 나타내는 구조체를 반환하는 함수
  Date Dateof(int y, int m, int d);

2. 날짜 x의 n일 이후의 날짜를 반환하는 함수
  Date After(Date x, int n);

3. 날짜 x의 n일 이전의 날짜를 반환하는 함수
  Date Before(Date x, int n);

이 외에도 다양한 함수를 스스로 설계하여 작성해 보세요.
*/
#include <stdio.h>

typedef struct {
    int y;      // 년
    int m;      // 월 (1 ~ 12)
    int d;      // 일 (1 ~ 31)
} Date;

Date After(Date x, int n);
Date Before(Date x, int n);

// 각 달의 일수
int mdays[][12] = {
        {31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31},
        {31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31},
};

// year 년이 윤년인가?
int isleap(int year) {
    return year % 4 == 0 && year % 100 != 0 || year % 400 == 0;
}

// y년 m월 d일을 나타내는 구조체를 반환하는 함수
Date DateOf(int y, int m, int d) {
    Date temp;

    temp.y = y;
    temp.m = m;
    temp.d = d;

    return temp;
}

// 날짜 x의 n일 이후의 날짜를 반환
Date After(Date x, int n) {
    if (n < 0)
        return Before(x, -n);

    x.d += n;

    while (x.d > mdays[isleap(x.y)][x.m - 1]) {
        x.d -= mdays[isleap(x.y)][x.m - 1];
        if (++x.m > 12) {
            x.y++;
            x.m = 1;
        }
    }
    return x;
}

// 날짜 x의 n일 이전의 날짜를 반환
Date Before(Date x, int n) {
    if (n < 0)
        return After(x, -n);

    x.d -= n;

    while (x.d < 1) {
        if (--x.m < 1) {
            x.y--;
            x.m = 12;
        }
        x.d += mdays[isleap(x.y)][x.m - 1];
    }
    return x;
}

// 날짜를 출력합니다.
int Print(Date x) {
    int y = x.y;
    int m = x.m;
    int d = x.d;

    char* ws[] = {"일", "월", "화", "수", "목", "금", "토"};
    if (m == 1 || m == 2) {
        y--;
        m += 12;
    }
    printf("%4d년 %2d월 %2d일 (%s)", x.y, x.m, x.d, ws[(y + y / 4 - y / 100 + y / 400 + (13 * m + 8) / 5 + d) % 7]);
}

int main() {

    int n;      // 며칠 이전 또는 이후
    int year, month, day;       // 년, 월, 일
    int retry;                  // 한번 더?
    Date x;

    do {
        printf("날짜를 입력하세요.\n");
        printf("년: "); scanf("%d", &year);
        printf("월: "); scanf("%d", &month);
        printf("일: "); scanf("%d", &day);

        x = DateOf(year, month, day);

        printf("며칠 이전/이후의 날짜를 구할까요?");
        scanf("%d", &n);

        printf("%d일 이전의 날짜: ", n);
        Print(Before(x, n));
        putchar('\n');

        printf("%d일 이후의 날짜: ", n);
        Print(After(x, n));
        putchar('\n');

        printf("한번 더 할까요? (1...예 / 0...아니오): ");
        scanf("%d", &retry);
    } while (retry == 1);

    return 0;
}
