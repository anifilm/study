// int형 스택 IntStack(소스)
#include <stdio.h>
#include <stdlib.h>
#include "5-5_IntStack.h"

// 스택 초기화
int Initialize(IntStack* s, int max) {
    s->ptr = 0;
    if ((s->stk = (int*)calloc(max, sizeof(int))) == NULL) {
        s->max = 0;     // 배열 생성에 실패
        return -1;
    }
    s->max = max;
    return 0;
}

// 스택에 데이터를 푸시
int Push(IntStack* s, int x) {
    if (s->ptr >= s->max)   // 스택이 가득 참
        return -1;
    s->stk[s->ptr++] = x;   // 새로 추가할 데이터를 배열 요소에 저장하고
                            // 스택 포인터 ptr을 증가시킴
    return 0;
}

// 스택에서 데이터를 팝
int Pop(IntStack* s, int* x) {
    if (s->ptr <= 0)        // 스택이 비어 있음
        return -1;
    *x = s->stk[--s->ptr];  // 먼저 스택 포인터 ptr의 값을 감소시키고
                            // stk[ptr]에 저장된 값을 포인터 x가 가리키는 변수에 저장
                            // 책에는 [s->ptr--]이지만 [--s->ptr]로 수정
    return 0;
}

// 스택에서 데이터를 피크
int Peek(const IntStack* s, int* x) {
    if (s->ptr <= 0)        // 스택이 비어 있음
        return -1;
    *x = s->stk[s->ptr - 1];
    return 0;
}

// 스택 비우기
void Clear(IntStack* s) {
    s->ptr = 0;
}

// 스택의 최대 용량
int Capacity(const IntStack* s) {
    return s->max;
}

// 스택의 데이터 개수
int Size(const IntStack* s) {
    return s->ptr;
}

// 스택이 비어 있나요?
int IsEmpty(const IntStack* s) {
    return s->ptr <= 0;
}

// 스택이 가득 찼나요?
int IsFull(const IntStack* s) {
    return s->ptr >= s->max;
}

// 스택에서 검색
int Search(const IntStack* s, int x) {
    int i;
    for (i = s->ptr - 1; i >= 0; i--)   // 꼭대기(top) → 바닥(bottom)으로 선형 검색
        if (s->stk[i] == x)
            return i;                   // 검색 성공
    return -1;                          // 검색 실패
}

// 모든 데이터 출력
void Print(const IntStack* s) {
    int i;
    for (i = 0; i < s->ptr; i++)        // 바닥(bottom) → 꼭대기(top)로 스캔
        printf("%d ", s->stk[i]);
    putchar('\n');
}

// 스택 종료
void Terminate(IntStack* s) {
    if (s->stk != NULL)
        free(s->stk);                   // 배열을 삭제
    s->max = s->ptr = 0;
}
