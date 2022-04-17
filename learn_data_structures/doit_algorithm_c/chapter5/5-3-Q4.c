/* Q4
오른쪽의 recurs 함수를 보고 하향식 분석과 상향식 분석을 수행해 보세요.
*/
#include <stdio.h>

// 재귀 함수 recur2
void recur2(int n) {
    if (n > 0) {
        recur2(n - 2);
        printf("%d\n", n);
        recur2(n - 1);
    }
}

int main() {

    int x;

    printf("정수를 입력하세요: ");
    scanf("%d", &x);

    recur2(x);

    return 0;
}

/*

[하향식 분석]

                                 recur2(2) [4] recur2(3)
                               ↙
        recur2(0) [2] recur2(1)                           recur2(1) [3] recur2(2)
                            ↘                            ↙                       ↘
                 recur2(-1) [1] recur2(0)   recur2(-1) [1] recur2(0)   recur2(0) [2] recur2(1)
                                                                                           ↘
                                                                                recur2(-1) [1] recur2(0)

2 1 4 1 3 2 1


[상향식 분석] (좀 더 자세히 알아볼 것!)

recur2(1) :  recur2(-1) [1] recur2(0)  →   (2) [1] (4) [1] (3) (2) [1]

recur2(2) :   recur2(0) [2] recur2(1)  →   [2] (1) (4) (1) (3) [2]

recur2(3) :   recur2(1) [3] recur2(2)  →   (2) (1) (4) (1) [3]

recur2(4) :   recur2(2) [4] recur2(3)  →   (2) (1) [4] (1)

*/
