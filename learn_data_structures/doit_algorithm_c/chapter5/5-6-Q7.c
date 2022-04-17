/* Q7
실습 5-6의 move 함수를 비재귀적으로 수정하세요.
*/
#include <stdio.h>
#include "5-5_IntStack.h"

// 원반[1] ~ 원반[no]를 x기둥에서 y기둥으로 욺김
void move(int no, int x, int y) {
    int sw = 0;
    IntStack xstk, ystk, sstk;      // 스택

    Initialize(&xstk, 100);
    Initialize(&ystk, 100);
    Initialize(&sstk, 100);

    while (1) {
        if (sw == 0 && no > 1) {
            Push(&xstk, x);         // x값을 푸시
            Push(&ystk, y);         // y값을 푸시
            Push(&sstk, sw);        // sw값을 푸시
            no = no - 1;
            y = 6 - x - y;
            continue;
        }
        printf("원반[%d]을(를) %d 기둥에서 %d 기둥으로 옮김\n", no, x, y);

        if (sw == 1 && no > 1) {
            Push(&xstk, x);         // x값을 푸시
            Push(&ystk, y);         // y값을 푸시
            Push(&sstk, sw);        // sw값을 푸시
            no = no - 1;
            x = 6 - x - y;
            if (++sw == 2) sw = 0;
            continue;
        }

        do {
            if (IsEmpty(&xstk))     // 스택이 비어있는 상태이면
                return;
            Pop(&xstk, &x);         // x값을 팝
            Pop(&ystk, &y);         // y값을 팝
            Pop(&sstk, &sw);        // sw값을 팝
            sw++;
            no++;
        } while (sw == 2);
    }

    Terminate(&xstk);
    Terminate(&ystk);
    Terminate(&sstk);
}

int main() {

    int n;      // 원반의 개수

    printf("하노이의 탑\n원반 개수: ");
    scanf("%d", &n);

    move(n, 1, 3);

    return 0;
}
