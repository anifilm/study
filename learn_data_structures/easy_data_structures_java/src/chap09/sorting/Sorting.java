package chap09.sorting;

public class Sorting {
    int A[];

    public Sorting(int B[]) {
        A = B;
    }

    // [알고리즘 9-2] 구현: 선택 정렬2
    public void selectionSort() {
        int k; int tmp;
        for (int last = A.length-1; last >= 1; last--) {
            k = theLargest(last); // A[0...last] 중 가장 큰 수 A[k] 찾기
            tmp = A[k]; A[k] = A[last]; A[last] = tmp;
        }
    }

    private int theLargest(int last) {
        // A[0...last]에서 가장 큰 수의 인덱스를 리턴한다.
        int largest = 0;
        for (int i = 0; i <= last; i++) {
            if (A[i] > A[largest]) {
                largest = i;
            }
        }
        return largest;
    }

    // [알고리즘 9-3] 구현: 버블 정렬
    public void bubbleSort() {
        int tmp = 0;
		boolean swapped;
		for (int last = A.length-1; last >= 2; last--) {
			swapped = false;
			for (int i = 0; i <= last-1; i++) {
				if (A[i] > A[i+1]) {
					tmp = A[i]; A[i] = A[i+1]; A[i+1] = tmp;
					swapped = true;
				}
            }
			if (swapped == false) break;
		}
		//tmp = tmp;
    }

    // [알고리즘 9-5] 구현: 삽입 정렬2
    public void insertionSort() {
        for (int i = 1; i <= A.length-1; i++) {
            int loc = i - 1;
            int newItem = A[i];
            while (loc >= 0 && newItem < A[loc]) {
                A[loc+1] = A[loc];
                loc--;
            }
            A[loc + 1] = newItem;
        }
    }

    // [알고리즘 9-6] 구현: 병합 정렬
    public void mergeSort() {
        int[] B = new int[A.length];
        mSort(0, A.length-1, B);
    }

    private void mSort(int p, int r, int[] B) {
        if (p < r) {
            int q = (p + r) / 2; // p, r의 중간 지점을 계산한다.
            mSort(p, q, B);      // 전반부 정렬
            mSort(q + 1, r, B);  // 후반부 정렬
            merge(p, q, r, B);   // 병합
        }
    }

    // [알고리즘 9-7] 구현: 병합 알고리즘
    private void merge(int p, int q, int r, int[] B) {
        int i = p; int j = q + 1; int t = 0;
        while (i <= q && j <= r) {
            if (A[i] <= A[j]) {
                B[t++] = A[i++];
            } else {
                B[t++] = A[j++];
            }
        }
        while (i <= q) { // 왼쪽 부분 배열이 남은 경우
            B[t++] = A[i++];
        }
        while (j <= r) { // 오른쪽 부분 배열이 남은 경우
            B[t++] = A[j++];
        }
        i = p; t = 0;
        while (i <= r) { // 결과를 A[p..r]에 저장
            A[i++] = B[t++];
        }
    }

    // [알고리즘 9-8] 구현: 퀵 정렬
	public void quickSort() {
        qSort(0, A.length-1);
    }

    private void qSort(int p, int r) {
        if (p < r) {
            int q = partition(p, r); // 분할
            qSort(p, q-1); // 왼쪽 부분 배열 정렬
            qSort(q+1, r); // 오른쪽 부분 배열 정렬
        }
    }

    // [알고리즘 9-9] 구현: 분할 알고리즘
    private int	partition(int p, int r) {
        int x = A[r];  // 기준 요소
        int i = p - 1; // i는 1구역의 끝 지점
        int tmp;
        for (int j = p; j <= r-1; j++) { // j는 3구역의 시작 지점
            if (A[j] <= x) {
                i++;
                tmp = A[i]; A[i] = A[j]; A[j] = tmp; // i값 증가 후 A[i]와 A[j]를 교환한다.
            }
        }
        tmp = A[i+1]; A[i+1] = A[r]; A[r] = tmp; // 기준 요소와 2구역 첫 요소를 교환한다.
        return i + 1;
    }
}
