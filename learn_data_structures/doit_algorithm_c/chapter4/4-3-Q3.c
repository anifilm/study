/* Q3
이 페이지의 아이디어를 기반으로 큐를 구현하는 프로그램을 만드세요. 큐를 관리하는
구조체는 아래의 멤버를 갖는 ArrayIntQueue를 사용하세요.
(실습 4-5에 사용된 함수를 참고하여 프로그램을 완성하세요.)
*/
#include <stdio.h>
#include "4-3-Q3_ArrayIntQueue.h"

int main() {
    ArrayIntQueue que;

    if (Initialize(&que, 64) == -1) {
        puts("큐 생성에 실패하였습니다.");
        return 1;
    }

    while (1) {
        int menu, x;
        printf("\n현재 데이터 수: %d / %d\n", Size(&que), Capacity(&que));
        printf("(1)인큐 (2)디큐 (3)피크 (4)출력 (0)종료\n");
        scanf("%d", &menu);

        if (menu == 0) break;
        switch (menu) {
            case 1: // 인큐
                printf("데이터: ");
                scanf("%d", &x);
                if (Enque(&que, x) == -1)
                    puts("\a오류: 인큐에 실패하였습니다.");
                break;
            case 2: // 디큐
                if (Deque(&que, &x) == -1)
                    puts("\a오류: 디큐에 실패하였습니다.");
                else
                    printf("디큐 데이터는 %d 입니다.\n", x);
                break;
            case 3: // 피크
                if (Peek(&que, &x) == -1)
                    puts("\a오류: 피크에 실패하였습니다.");
                else
                    printf("피크 데이터는 %d 입니다.\n", x);
                break;
            case 4: // 출력
                Print(&que);
                break;
        }
    }
    Terminate(&que);

    return 0;
}
