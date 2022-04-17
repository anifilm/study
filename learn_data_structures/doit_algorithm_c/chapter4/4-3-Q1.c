/* Q1
실습 4-3의 프로그램은 IntStack.c에서 제공하는 함수를 모두 사용하지 않습니다.
모든 함수를 사용하는 프로그램을 만드세요.
*/
#include <stdio.h>
#include "4-1_IntStack.h"

int main() {
    IntStack s;

    if (Initialize(&s, 64) == -1) {
        puts("스택 생성에 실패하였습니다.");
        return 1;
    }

    while (1) {
        int menu, x, idx;
        printf("\n현재 데이터 수: %d / %d\n", Size(&s), Capacity(&s));
        printf("1)푸시 2)팝 3)피크 4)출력 5)검색 6)초기화 7)빈 상태/가득 찬 상태 0)종료\n");
        scanf("%d", &menu);
        if (menu == 0) break;

        switch (menu) {
            case 1: // 푸시
                printf("데이터: ");
                scanf("%d", &x);
                if (Push(&s, x) == -1)
                    puts("\a오류: 푸시에 실패하였습니다.");
                break;
            case 2: // 팝
                if (Pop(&s, &x) == -1)
                    puts("\a오류: 팝에 실패하였습니다.");
                else
                    printf("팝 데이터는 %d 입니다.\n", x);
                break;
            case 3: // 피크
                if (Peek(&s, &x) == -1)
                    puts("\a오류: 피크에 실패하였습니다.");
                else
                    printf("피크 데이터는 %d 입니다.\n", x);
                break;
            case 4: // 출력
                Print(&s);
                break;
            case 5: // 검색
                printf("검색 데이터: ");
                scanf("%d", &x);
                if ((idx = Search(&s, x)) == -1)
                    puts("\a오류: 검색에 실패하였습니다.");
                else
                    printf("데이터는 인덱스 %d 위치에 있습니다.\n", idx);
                break;
            case 6: // 초기화
                Clear(&s);
                break;
            case 7: // 빈 상태 / 가득 찬 상태
                printf("스택에 비어 %s.\n", IsEmpty(&s) ? "있습니다" : "있지 않습니다");
                printf("스택에 가득 %s.\n", IsFull(&s) ? "찼습니다" : "차지 않았습니다");
                break;
        }
    }
    Terminate(&s);

    return 0;
}
