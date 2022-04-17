// qsort 함수를 사용하여 정수 배열을 오름차순으로 정렬
#include <stdio.h>
#include <stdlib.h>

// int형 비교 함수 (오름차순 정렬에 사용)
int int_cmp(const int* a, const int* b) {
    if (*a < *b)
        return -1;
    else if (*a > *b)
        return 1;
    else
        return 0;
}

// int형 비교 함수 (내림차순 정렬에 사용)
int int_cmpr(const int* a, const int* b) {
    if (*a < *b)
        return 1;
    else if (*a > *b)
        return -1;
    else
        return 0;
}

int main() {

    int i, nx;
    int* x;         // 배열의 첫번째 요소에 대한 포인터

    puts("qsort에 의한 정렬");
    printf("요소 개수: ");
    scanf("%d", &nx);
    x = (int*)calloc(nx, sizeof(int));    // 요소의 개수가 nx인 int형 배열을 생성

    for (i = 0; i < nx; i++) {
        printf("x[%d]: ", i);
        scanf("%d", &x[i]);
    }

    qsort(x,                                        // 배열
        nx,                                         // 요소의 개수
        sizeof(int),                                // 요소의 크기
        (int(*)(const void*, const void*))int_cmp   // 비교 함수
    );

    printf("\n오름차순으로 정렬했습니다.\n");
    for (i = 0; i < nx; i++)
        printf("x[%d] = %d\n", i, x[i]);

    free(x);        // 배열 해제
    return 0;
}

/*

[qsort 함수]

헤더  #include <stdlib.h>

형식  void qsort(void* base, size_t nmemb, size_t size, int(*compar)(const void*, const void*));

해설  qsort 함수의 인자로 전달하는 값은 총 4개 입니다. base는 정렬할 배열을 가리키고,
     nmemb는 요소의 개수입니다.
     size는 배열 요소의 크기이고 마지막으로 전달하는 함수의 인자 compar는 비교 함수입니다.
     즉, compar에 지정한 비교 함수를 사용하여 정렬하게 됩니다. compar에 전달할 비교 함수는
     다음과 같은 기능을 할 수 있도록 직접 작성해야 합니다. 첫 번째 인수가 두 번째 인수보다
     작은 경우에는 0보다 작은 값을, 같을 경우에는 0을, 클 경우에는 0보다 큰 정수를 반환합니다.
     비교하는 두 요소가 같을 경우에는 순서를 다시 배치하지 않습니다.


비교 함수는 아래의 값을 반환하는 함수이며 직접 작성해야 합니다.

[비교 함수의 반환값]

1. 첫 번째 인수가 가리키는 값이 더 작은 경우 음수 값 (-1)을 반환합니다.
2. 첫 번째 인수가 가리키는 값과 두 번째 인수가 가리키는 값이 같은 경우 0을 반환합니다.
3. 첫 번재 인수가 가리키는 값이 더 큰 양수 값 (1)을 반환합니다.

*/
