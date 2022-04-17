/* Q12
실습 2-13 프로그램의 시력 분포를 오른쪽처럼 그래프 모양으로 출력하도록 프로그램을 작성하세요.
*/
#include <stdio.h>
#define VMAX 21     // 시력 최대값 2.1 x 10

// 신체검사 데이터형
typedef struct {
    char name[20];      // 이름
    int height;         // 키
    double vision;      // 시력
} PhysCheck;

// 키의 평균값을 구합니다.
double ave_height(const PhysCheck dat[], int n) {
    int i;
    double sum = 0;
    for (i = 0; i < n; i++)
        sum += dat[i].height;
    return sum / n;
}

// 시력 분포를 구합니다.
void dist_vision(const PhysCheck dat[], int n, int dist[]) {
    int i;
    for (i = 0; i < VMAX; i++)
        dist[i] = 0;
    for (i = 0; i < n; i++) {
        if (dat[i].vision >= 0.0 && dat[i].vision <= VMAX / 10.0)
            dist[(int)(dat[i].vision * 10)]++;
    }
}

int main() {

    int i, j;
    PhysCheck x[] = {
            {"박현규", 162, 0.3},
            {"함진아", 173, 0.8},
            {"최윤미", 175, 1.5},
            {"횽현의", 171, 1.5},
            {"이수진", 168, 0.8},
            {"김영준", 174, 1.2},
            {"박용규", 169, 0.8}
    };

    int nx = sizeof(x) / sizeof(x[0]);  // 사람 수
    int vdist[VMAX];                    // 시력 분포

    puts("====== 신체검사표 =======");
    printf(" %-17s%4s  %5s\n", "이름", "키", "시력");
    puts("-----------------------");
    for (i = 0; i < nx; i++)
        printf("%-18.18s%4d%5.1f\n", x[i].name, x[i].height, x[i].vision);

    printf("\n평균키: %5.1f cm\n", ave_height(x, nx));
    dist_vision(x, nx, vdist);          // 시력 분포를 구합니다.
    printf("\n시력 분포\n");
    for (i = 0; i < VMAX; i++) {
        printf("%3.1f ~ : ", i / 10.0);
        if (vdist[i] != 0) {
            for (j = 0; j < vdist[i]; j++)
                printf("*");
            printf("\n");
        } else
            printf("\n");
    }

    return 0;
}
