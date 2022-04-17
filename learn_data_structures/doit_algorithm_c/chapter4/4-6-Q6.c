/* Q6
일반적으로 덱(deck)이라는 양방향 대기열(deque/double ended queue)은 아래 그림
처럼 시작과 끝 지점에서 양쪽으로 데이터를 인큐하거나 디큐하는 자료구조입니다. 양방향
대기열을 구현하는 프로그램을 만드세요. 이때 덱(deck)에 저장하는 데이터의 자료형은
int형으로 합니다.
*/
#include <stdio.h>
#include "4-6-Q6_IntDequeue.h"

int main() {
    IntDequeue que;

    if (Initialize(&que, 64) == -1) {
        puts("큐 생성에 실패하였습니다.");
        return 1;
    }

    while (1) {
        int menu, x, idx;
        printf("\n현재 데이터 수: %d / %d\n", Size(&que), Capacity(&que));
        printf("1) 맨 앞에 데이터 인큐 2) 맨 앞의 데이터 디큐 3) 맨 앞 피크 4) 출력\n"
               "5) 맨 뒤에 데이터 인큐 6) 맨 뒤의 데이터 디큐 7) 맨 뒤 피크 8) 검색\n"
               "9) 초기화 10) 비어 있는 상태/가득 찬 상태 0) 종료\n");
        scanf("%d", &menu);

        if (menu == 0) break;
        switch (menu) {
            case 1: // 맨 앞에 데이터 인큐
            printf("데이터: ");   scanf("%d", &x);
            if (EnqueFront(&que, x) == -1)
                puts("\a오류: 인큐에 실패했습니다.");
            break;
            case 2: // 맨 앞의 데이터 디큐
                if (DequeFront(&que, &x) == -1)
                    puts("\a오류: 디큐에 실패했습니다.");
                else
                    printf("디큐한 데이터는 %d 입니다.\n", x);
                break;
            case 3: // 맨 앞 피크
                if (PeekFront(&que, &x) == -1)
                    puts("\a오류: 피크에 실패했습니다.");
                else
                    printf("피크한 데이터는 %d 입니다.\n", x);
                break;
            case 4: // 출력
                Print(&que);
                break;
            case 5: // 맨 뒤에 데이터 인큐
                printf("데이터: ");   scanf("%d", &x);
                if (EnqueRear(&que, x) == -1)
                    puts("\a오류: 인큐에 실패했습니다.");
                break;
            case 6: // 맨 뒤의 데이터 디큐
                if (DequeRear(&que, &x) == -1)
                    puts("\a오류: 디큐에 실패했습니다.");
                else
                    printf("디큐한 데이터는 %d 입니다.\n", x);
                break;
            case 7: // 맨 뒤 피크
                if (PeekRear(&que, &x) == -1)
                    puts("\a오류 : 피크에 실패했습니다.");
                else
                    printf("피크한 데이터는 %d 입니다.\n", x);
                break;
            case 8: // 검색
                printf("검색 데이터：");
                scanf("%d", &x);
                if ((idx = Search(&que, x)) == -1)
                    puts("\a오류: 검색에 실패했습니다.");
                else {
                    printf("데이터는 인덱스 %d 위치에 있습니다.\n", idx);
                    printf("큐의 맨 앞에서 %d만큼 뒤에 위치합니다.\n", Search2(&que, x));
                }
                break;
            case 9: // 초기화
                Clear(&que);
                break;
            case 10: // 빈 상태 / 가득 찬 상태
                printf("큐가 비어 %s.\n", IsEmpty(&que) ? "있습니다" : "있지 않습니다");
                printf("큐가 가득 %s.\n", IsFull(&que) ? "찼습니다" : "차지 않았습니다");
                break;
        }
    }
    Terminate(&que);

    return 0;
}
