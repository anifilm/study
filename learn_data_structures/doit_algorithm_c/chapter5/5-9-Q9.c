/* Q9
8퀸 문제를 비재귀적으로 구현한 프로그램을 작성하세요.
*/
#include <stdio.h>
#include "5-5_IntStack.h"

int flag_a[8];          // 각 행에 퀸을 배치했는지 체크하는 배열
int flag_b[15];         // 대각선 /에 퀸을 배치했는지 체크하는 배열
int flag_c[15];         // 대각선 \에 퀸을 배치했는지 체크하는 배열
int pos[8];             // 각 열에서 퀸의 위치

// 각 열의 퀸의 위치를 출력
void print() {
    int i;
    for (i = 0; i < 8; i++)
        printf("%2d", pos[i]);
    putchar('\n');
}

// i열에 알맞은 위치에 퀸을 배치
void set(int i) {
    int j;
    IntStack jstk;
    Initialize(&jstk, 8);

Start:
    while (1) {
        j = 0;
        while (1) {
            while (j < 8) {
                if (!flag_a[j] && !flag_b[i + j] && !flag_c[i - j + 7]) {
                    pos[i] = j;
                    if (i == 7)				// 전체 열 배치 마침
                        print();
                    else {
                        flag_a[j] = flag_b[i + j] = flag_c[i - j + 7] = 1;
                        i++;
                        Push(&jstk, j);		// i 번째 열의 행을 푸시
                        goto Start;
                    }
                }
                j++;
            }
            if (--i == -1) return;
            Pop(&jstk, &j);					// i 번째 열의 행을 팝
            flag_a[j] = flag_b[i + j] = flag_c[i - j + 7] = 0;
            j++;
        }
    }
    Terminate(&jstk);
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
