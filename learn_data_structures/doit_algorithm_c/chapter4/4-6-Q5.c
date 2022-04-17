/* Q5
실습 4-6에서 사용하는 함수는 IntQueue.c에서 제공하는 함수를 모두 사용하지 않았
습니다. 바로 앞 문제에서 만든 Search2 함수를 포함하여 모든 함수를 사용하는 프로그램
을 만드세요.
*/
#include <stdio.h>
#include "4-6-Q5_IntQueue2.h"

int main() {
    IntQueue que;

    if (Initialize(&que, 64) == -1) {
        puts("큐 생성에 실패하였습니다.");
        return 1;
    }

    while (1) {
        int menu, x, idx;
        printf("\n현재 데이터 수: %d / %d\n", Size(&que), Capacity(&que));
        printf("(1)인큐 (2)디큐 (3)피크 (4)출력 (5)검색 (6)초기화 (7)빈 상태/가득 찬 상태 (0)종료\n");
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
            case 5: // 검색
                printf("검색 데이터：");
                scanf("%d", &x);
                if ((idx = Search(&que, x)) == -1)
                    puts("\a오류 : 검색에 실패했습니다.");
                else {
                    printf("데이터는 인덱스 %d 위치에 있습니다.\n", idx);
                    printf("큐의 맨 앞의 요소에서 %d 만큼 뒤에 있습니다.\n", Search2(&que, x));
                }
                break;
            case 6: // 초기화
                Clear(&que);
                break;
            case 7: // 빈 상태 / 가득 찬 상태
                printf("큐가 비어 %s.\n", IsEmpty(&que) ? "있습니다" : "있지 않습니다");
                printf("큐가 가득 %s.\n", IsFull(&que) ? "찼습니다" : "차지 않았습니다");
                break;
        }
    }
    Terminate(&que);

    return 0;
}
