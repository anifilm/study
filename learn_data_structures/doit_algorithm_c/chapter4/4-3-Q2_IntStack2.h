#ifndef ___IntStack2
#define ___IntStack2

enum {StackA, StackB};

typedef struct {
    int max;
    int ptrA;
    int ptrB;
    int* stk;
} IntStack;

// 스택 초기화
int Initialize(IntStack* s, int max);

// 스택에 데이터를 푸시
int Push(IntStack* s, int sw, int x);

// 스택에서 데이터를 팝
int Pop(IntStack* s, int sw, int* x);

// 스택에서 데이터를 피크
int Peek(const IntStack* s, int sw, int* x);

// 스택 비우기
void Clear(IntStack* s, int sw);

// 스택의 최대 용량
int Capacity(const IntStack* s);

// 스택의 데이터 개수
int Size(const IntStack* s, int sw);

// 스택이 비어 있나요?
int IsEmpty(const IntStack* s, int sw);

// 스택이 가득 찼나요?
int IsFull(const IntStack* s);

// 스택에서 검색
int Search(const IntStack* s, int sw, int x);

// 모든 데이터 출력
void Print(const IntStack* s, int sw);

// 스택 종료
void Terminate(IntStack* s);

#endif
