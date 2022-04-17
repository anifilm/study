/* Q8
실습 5-9의 print 함수를 수정하여 전각기호 '■'와 '□'를 사용하하여 퀸의 배치
상황을 출력하세요.
*/
#include <stdio.h>

int flag_a[8];          // 각 행에 퀸을 배치했는지 체크하는 배열
int flag_b[15];         // 대각선 /에 퀸을 배치했는지 체크하는 배열
int flag_c[15];         // 대각선 \에 퀸을 배치했는지 체크하는 배열
int pos[8];             // 각 열에서 퀸의 위치

// 각 열의 퀸의 위치를 출력
void print() {
    int i, j;
    for (i = 0; i < 8; i++) {
        for (j = 0; j < 8; j++) {
            /*
            if (pos[i] == j)
                printf(" ■ ");
            else
                printf(" □ ");
            */
            printf(" %s ", j == pos[i] ? "■" : "□");
        }
        putchar('\n');
    }
    putchar('\n');
}

// i열에 알맞은 위치에 퀸을 배치
void set(int i) {
    int j;
    for (j = 0; j < 8; j++) {
        if (!flag_a[j] && !flag_b[i + j] && !flag_c[i - j + 7]) {
            pos[i] = j;
            if (i == 7)     // 모든 열에 배치를 마침
                print();
            else {
                flag_a[j] = flag_b[i + j] = flag_c[i - j + 7] = 1;
                set(i + 1);
                flag_a[j] = flag_b[i + j] = flag_c[i - j + 7] = 0;
            }
        }
    }
}

int main() {

    int i;

    for (i = 0; i < 8; i++)
        flag_a[i] = 0;
    for (i = 0; i < 15; i++)
        flag_b[i] = flag_c[i] = 0;
    set(0);

    return 0;
}
