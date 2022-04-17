/* Q4
int형 큐를 사용하는 프로그램에 임의의 데이터를 검색하는 아래의 함수를 추가하세요.
  int Search2(const IntQueue &q, int x);

이때 새로 만든 Search2 함수는 앞에서 만든 Search 함수처럼 찾은 요소의 인덱스를 반환
하지 않습니다. Search2 함수는 찾은 데이터가 맨 앞의 요소로부터 상대적으로 몇 번째
위치에 있는지에 대한 인덱스 값을 반환합니다. 검색에 실패할 경우에는 -1을 반환합니다.
(예를 들어 그림 4-16에서 35를 검색하면 0을, 56을 검색하면 1을, 73을 검색하면 5를
반환 합니다. 큐에 존재하지 않는 값인 99를 검색하면 -1을 반환합니다.)
*/
#include <stdio.h>
#include "4-4_IntQueue.h"

// 큐에서 검색 (논리적 인덱스 반환)
int Search2(const IntQueue* q, int x) {
    int i;
    for (i = 0; i <= q->num; i++) {
        if (q->que[(i + q->front) % q->max] == x)
            return i;   // 검색 성공
    }
    return -1;          // 검색 실패
}
