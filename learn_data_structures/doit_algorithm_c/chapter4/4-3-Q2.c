/* Q2
하나의 배열을 공유하여 2개의 스택을 구현하는 스택 프로그램을 만드세요. 스택에
저장하는 데이터는 int형 값으로 아래 그림처럼 배열의 처음과 끝을 사용하세요.
*/
#include <stdio.h>
#include "4-3-Q2_IntStack2.h"

int main() {
    IntStack s;

    if (Initialize(&s, 12) == -1) {
        puts("스택 생성에 실패하였습니다.");
        return 1;
    }

    while (1) {
        int menu, x, idx;
        printf("현재 데이터 개수 : A:%d B:%d / %d\n", Size(&s, StackA), Size(&s, StackB), Capacity(&s));
        printf("1) A에 푸시 2) A에서 팝 3) A에서 피크  4) A를 출력  5) A에서 검색  6) A를 초기화\n"
               "7) B에 푸시 8) B에서 팝 9) B에서 피크 10) B를 출력 11) B에서 검색 12) B를 초기화\n"
               "13) 빈 상태/가득 찬 상태  0) 종료\n");
        scanf("%d", &menu);
        if (menu == 0) break;

        switch (menu) {
            case 1: // A에 푸시
                printf("데이터: ");
                scanf("%d", &x);
                if (Push(&s, StackA, x) == -1)
                    puts("\a오류: 푸시에 실패했습니다.");
                break;
            case 2: // A에서 팝
                if (Pop(&s, StackA, &x) == -1)
                    puts("\a오류: 팝에 실패했습니다.");
                else
                    printf("팝한 데이터는 %d입니다.\n", x);
                break;
            case 3: // A에서 피크
                if (Peek(&s, StackA, &x) == -1)
                    puts("\a오류: 피크에 실패했습니다.");
                else
                    printf("피크한 데이터는 %d입니다.\n", x);
                break;
            case 4: // A를 출력
                Print(&s, StackA);
                break;
            case 5: // A에서 검색
                printf("검색 데이터: ");
                scanf("%d", &x);
                if ((idx = Search(&s, StackA, x)) == -1)
                    puts("\a오류: 검색에 실패했습니다.");
                else
                    printf("데이터는 인덱스 %d 위치에 있습니다.\n", idx);
                break;
            case 6: // A를 초기화
                Clear(&s, StackA);
                break;
            case 7: // B에 푸시
                printf("데이터: ");
                scanf("%d", &x);
                if (Push(&s, StackB, x) == -1)
                    puts("\a오류: 푸시에 실패했습니다.");
                break;
            case 8: // B에서 팝
                if (Pop(&s, StackB, &x) == -1)
                    puts("\a오류: 팝에 실패했습니다.");
                else
                    printf("팝한 데이터는 %d입니다.\n", x);
                break;
            case 9: // B에서 피크
                if (Peek(&s, StackB, &x) == -1)
                    puts("\a오류: 피크에 실패했습니다.");
                else
                    printf("피크한 데이터는 %d입니다.\n", x);
                break;
            case 10: // B를 출력
                Print(&s, StackB);
                break;
            case 11: // B에서 검색
                printf("검색 데이터: ");
                scanf("%d", &x);
                if ((idx = Search(&s, StackB, x)) == -1)
                    puts("\a오류: 검색에 실패했습니다.");
                else
                    printf("데이터는 인덱스 %d 위치에 있습니다.\n", idx);
                break;
            case 12: // B를 초기화
                Clear(&s, StackB);
                break;
            case 13: // 빈 상태 / 가득 찬 상태
                printf("스택 A는 비어 %s.\n", IsEmpty(&s, StackA) ? "있습니다" : "있지 않습니다");
                printf("스택 B는 비어 %s.\n", IsEmpty(&s, StackB) ? "있습니다" : "있지 않습니다");
                printf("스택은 가득 %s.\n", IsFull(&s) ? "찼습니다" : "차지 않았습니다");
                break;
        }
    }
    Terminate(&s);

    return 0;
}
