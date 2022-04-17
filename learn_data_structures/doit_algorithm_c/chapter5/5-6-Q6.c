/* Q6
실습 5-6을 숫자가 아닌 문자열로 기둥 이름을 출력하도록 프로그램을 수정하세요.
예를 들어 'A 기둥', 'B 기둥', 'C 기둥'과 같이 출력하면 됩니다.
*/
#include <stdio.h>

// 원반[1] ~ 원반[no]를 x기둥에서 y기둥으로 욺김
void move(int no, int x, int y) {
    char *name[] = {"A 기둥", "B 기둥", "C 기둥"};
    if (no > 1)
        move(no - 1, x, 6 - x - y);     // 그룹을 시작 기둥에서 중간 기둥으로
    printf("원반[%d]을(를) %s에서 %s으로 옮김\n", no, name[x - 1], name[y - 1]);  // 바닥 원반을 목표 기둥으로

    if (no > 1)
        move(no - 1, 6 - x - y, y);     // 그룹을 중간 기둥에서 목표 기둥으로
}

int main() {

    int n;      // 원반의 개수

    printf("하노이의 탑\n원반 개수: ");
    scanf("%d", &n);

    move(n, 1, 3);

    return 0;
}
