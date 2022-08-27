#include "LinkedList.h"

Node* SLL_CreateNode(ElementType NewData) {
    Node* NewNode = (Node*)malloc(sizeof(Node));

    NewNode->Data = NewData;
    NewNode->NextNode = NULL;

    return NewNode;
}

void SLL_DestroyNode(Node* Node) {
    free(Node);
}

void SLL_AppendNode(Node** Head, Node* NewNode) {
    if ((*Head) == NULL) {
        *Head = NewNode;
    }
    else {
        Node* Tail = (*Head);
        while (Tail->NextNode != NULL) {
            Tail = Tail->NextNode;
        }

        Tail->NextNode = NewNode;
    }
}

void SLL_InsertAfter(Node* Current, Node* NewNode) {
    NewNode->NextNode = Current->NextNode;
    Current->NextNode = NewNode;
};

void SLL_InsertNewHead(Node** Head, Node* NewHead) {
    if (Head == NULL) {
        (*Head) = NewHead;
    }
    else {
        NewHead->NextNode = (*Head);
        (*Head) = NewHead;
    }
};

void SLL_RemoveNode(Node** Head, Node* Remove) {
    if (*Head == Remove) {
        *Head = Remove->NextNode;
    }
    else {
        Node* Current = *Head;
        while (Current != NULL && Current->NextNode != Remove) {
            Current = Current->NextNode;
        }

        if (Current != NULL) {
            Current->NextNode = Remove->NextNode;
        }
    }
};

Node* SLL_GetNodeAt(Node* Head, int Location) {
    Node* Current = Head;

    while (Current != NULL && (--Location) >= 0) {
        Current = Current->NextNode;
    }

    return Current;
}

int SLL_GetNodeCount(Node* Head) {
    int Count = 0;
    Node* Current = Head;

    while (Current != NULL) {
        Current = Current->NextNode;
        Count++;
    }

    return Count;
};

// VITAMIN QUIZ 1-2
void SLL_InsertBefore(Node** Head, Node* Current, Node* NewNode) {
    // 이전 노드 찾기
    Node* PrevNode = (*Head);
    while (PrevNode != NULL && PrevNode->NextNode != Current) {
        PrevNode = PrevNode->NextNode;
    }
    // 노드 연결 (PrevNode -> NewNode -> Current)
    PrevNode->NextNode = NewNode;
    NewNode->NextNode = Current;
}

void SLL_DestroyAllNodes(Node** List) {
    int i = 0;
    int Count = 0;
    Node* Current = NULL;
    // 모든 노드를 메모리에서 제거
    printf("\nDestroying List...\n");

    Count = SLL_GetNodeCount((*List));
    for (i = 0; i < Count; i++) {
        Current = SLL_GetNodeAt((*List), 0);

        if (Current != NULL) {
            SLL_RemoveNode(List, Current);
            SLL_DestroyNode(Current);
        }
    }
}
