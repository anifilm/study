#include "CircularDoublyLinkedList.h"

Node* CDLL_CreateNode(ElementType NewData) {
    Node* NewNode = (Node*)malloc(sizeof(Node));

    NewNode->Data = NewData;
    NewNode->PrevNode = NULL;
    NewNode->NextNode = NULL;

    return NewNode;
}

void CDLL_DestroyNode(Node* Node) {
    free(Node);
}

void CDLL_AppendNode(Node** Head, Node* NewNode) {
    // Head 노드가 NULL이라면 새로운 노드가 Head가 된다.
    if ((*Head) == NULL) {
        *Head = NewNode;
        (*Head)->NextNode = *Head;
        (*Head)->PrevNode = *Head;
    }
    else {
        // Tail과 Head 사이에 NewNode를 연결한다.
        Node* Tail = (*Head)->PrevNode;

        Tail->NextNode->PrevNode = NewNode;
        Tail->NextNode = NewNode;

        NewNode->NextNode = (*Head);
        NewNode->PrevNode = Tail;
    }
}

void CDLL_InsertAfter(Node* Current, Node* NewNode) {
    NewNode->NextNode = Current->NextNode;
    NewNode->PrevNode = Current;

    if (Current->NextNode != NULL) {
        Current->NextNode->PrevNode = NewNode;
        Current->NextNode = NewNode;
    }
}

void CDLL_RemoveNode(Node** Head, Node* Remove) {
    if (*Head == Remove) {
        (*Head)->PrevNode->NextNode = Remove->NextNode;
        (*Head)->NextNode->PrevNode = Remove->PrevNode;

        *Head = Remove->NextNode;

        Remove->PrevNode = NULL;
        Remove->NextNode = NULL;
    }
    else {
        Remove->PrevNode->NextNode = Remove->NextNode;
        Remove->NextNode->PrevNode = Remove->PrevNode;

        Remove->PrevNode = NULL;
        Remove->NextNode = NULL;
    }
}

Node* CDLL_GetNodeAt(Node* Head, int Location) {
    Node* Current = Head;

    while (Current != NULL && (--Location) >= 0) {
        Current = Current->NextNode;
    }

    return Current;
}

int CDLL_GetNodeCount(Node* Head) {
    unsigned int Count = 0;
    Node* Current = Head;

    while (Current != NULL) {
        Current = Current->NextNode;
        Count++;

        if (Current == Head) break;
    }

    return Count;
}

void PrintNode(Node* Node) {
    // 선택된 노드의 이전, 현재, 다음 값을 출력
    if (Node->PrevNode == NULL) {
        printf("Prev: NULL\n");
    }
    else {
        printf("Prev: %d\n", Node->PrevNode->Data);
    }

    printf("Current: %d\n", Node->Data);

    if (Node->NextNode == NULL) {
        printf("Next: NULL\n");
    }
    else {
        printf("Next: %d\n", Node->NextNode->Data);
    }
}

// VITAMIN QUIZ 1-3
// 리스트를 역순으로 출력
void PrintReverse(Node* Head) {
    int Count = 0;
    Node* Current = Head;

    // 마지막 노드로 이동
    while (Current->NextNode != NULL) {
        Current = Current->NextNode;
        Count++;
    }

    while (Current != NULL) {
        // 값 출력후 이전 노드로 이동
        printf("List[%d] : %d\n", Count, Current->Data);
        Current = Current->PrevNode;
        Count--;
    }
}
