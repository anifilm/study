#ifndef ___IntDequeue
#define ___IntDequeue

typedef struct {
    int max;       // 큐의 최대 용량
    int num;       // 현재 요솟수
    int front;     // 맨 앞 요소를 가리키는 커서
    int rear;      // 맨 뒤 요소를 가리키는 커서
    int* que;      // 큐를 가리키는 포인터
} IntDequeue;

// 덱 초기화
int Initialize(IntDequeue* q, int max);

// 맨 앞에 데이터를 인큐
int EnqueFront(IntDequeue* q, int x);

// 맨 뒤에 데이터를 인큐
int EnqueRear(IntDequeue* q, int x);

// 맨 앞의 데이터를 디큐
int DequeFront(IntDequeue* q, int* x);

// 맨 뒤의 데이터를 디큐
int DequeRear(IntDequeue* q, int* x);

// 맨 앞의 데이터를 피크
int PeekFront(const IntDequeue* q, int* x);

// 맨 뒤의 데이터를 피크
int PeekRear(const IntDequeue* q, int* x);

// 모든 데이터 삭제
void Clear(IntDequeue* q);

// 덱의 최대 용량
int Capacity(const IntDequeue* q);

// 덱에 저장된 데이터 개수
int Size(const IntDequeue* q);

// 덱이 비어 있는가?
int IsEmpty(const IntDequeue* q);

// 덱이 가득 찼는가?
int IsFull(const IntDequeue* q);

// 덱에서 검색
int Search(const IntDequeue* q, int x);

// 덱에서 검색 (논리적 인덱스 반환)
int Search2(const IntDequeue* q, int x);

// 모든 데이터 출력
void Print(const IntDequeue* q);

// 덱 종료
void Terminate(IntDequeue* q);

#endif
