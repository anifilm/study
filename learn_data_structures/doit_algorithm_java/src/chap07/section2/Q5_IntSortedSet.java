/* Q5
IntSet 클래스는 요소의 순서가 정해져 있지 않습니다. 요소가 항상 오름차순으로 정렬되도록 클래스를 수정해 보세요. 수정한 클래스의 이름은 IntSortedSet으로 작성하면 됩니다. 이렇게 오름차순으로 요소를 정렬해 두면 이진 검색을 적용할 수 있어 편리합니다.
*/
package chap07.section2;

public class Q5_IntSortedSet {
    private int max; // 집합의 최대 개수
    private int num; // 집합의 요소 개수
    private int[] set; // 집합 본체

    // 생성자
    public Q5_IntSortedSet(int capacity) {
        num = 0;
        max = capacity;
        try {
            set = new int[max]; // 집합 배열 생성
        }
        catch (OutOfMemoryError e) { // 배열 생성 실패
            max = 0;
        }
    }

    // 집합의 최대 개수
    public int capacity() {
        return max;
    }

    // 집합의 요소 개수
    public int size() {
        return num;
    }

    // 집합에서 n을 검색하여 index를 반환, 찾지 못한 경우 (-삽입 포인트 - 1)를 반환
    public int indexOf(int n) {
        int pl = 0;   // 검색 범위 맨 앞의 index
        int pr = n-1; // 검색 범위 맨 뒤의 index

        do {
            int pc = (pl+pr) / 2; // 중앙 요소의 index
            if (set[pc] == n) return pc; // 검색 성공
            else if (set[pc] < n) pl = pc+1; // 검색 범위를 앞쪽 절반으로 좁힘
            else pr = pc-1; // 검색 범위를 뒤쪽 절반으로 좁힘
        } while (pl <= pr);

        return -pl - 1; // 검색 실패
    }

    // 집합에 n이 있는지 없는지 확인합니다.
    public boolean contains(int n) {
        return (indexOf(n) != -1) ? true : false;
    }

    // 집합에 n을 추가합니다.
    public boolean add(int n) {
		int idx;
		if (num >= max || (idx = indexOf(n)) >= 0) { // 가득 참 또는 들어 있음
			return false;
        }
		else {
			idx = -(idx+1);
			num++;
			for (int i = num-1; i > idx; i--)
				set[i] = set[i-1];
			set[idx] = n;
			return true;
		}
    }

    // 집합에서 n을 삭제합니다.
    public boolean remove(int n) {
        int idx; // n이 저장된 요소의 인덱스
        if (num <= 0 || (idx = indexOf(n)) == -1) {
            return false; // 비어 있거나 n이 존재하지 않습니다.
        }
        else {
			num--;
			for (int i = idx; i < num; i++) { // set[idx]를 삭제하고
				set[i] = set[i+1]; // 그 다음 요소를 한 칸 앞으로 옮김
            }
            return true;
        }
    }

    // 집합 s에 복사합니다.
    public void copyTo(Q5_IntSortedSet s) {
        int n = (s.max < num) ? s.max : num; // 복사할 요소 개수
        for (int i = 0; i < num; i++) {
            s.set[i] = set[i];
        }
        s.num = n;
    }

    // 집합 s를 복사합니다.
    public void copyFrom(Q5_IntSortedSet s) {
        int n = (max < s.num) ? max : s.num; // 복사항 요소 개수
        for (int i = 0; i < n; i++) {
            set[i] = s.set[i];
        }
        num = n;
    }

    // 집합 s와 같은지 확인합니다.
    public boolean equalTo(Q5_IntSortedSet s) {
        if (num != s.num) return false; // 요소 개수가 같지 않으면 집합도 같지 않습니다.
        for (int i = 0; i < num; i++) {
			if (set[i] == s.set[i]) return false;
        }
        return true;
    }

    // 집합 s1과 s2의 합집합을 복사합니다.
    public void unionOf(Q5_IntSortedSet s1, Q5_IntSortedSet s2) {
        copyFrom(s1); // 집합 s1을 복사합니다.
        for (int i = 0; i < s2.num; i++) { // 집합 s2의 요소를 추가합니다.
            add(s2.set[i]);
        }
    }

    // "{ a, b, c }" 형식의 문자열로 표현을 바꿉니다.
    public String toString() {
        StringBuffer temp = new StringBuffer("{ ");
        for (int i = 0; i < num; i++) {
            temp.append(set[i] + " ");
        }
        temp.append("}");
        return temp.toString();
    }


    // 공집합인지 확인합니다.
    public boolean isEmpty() {
        return num == 0;
    }
    // 집합이 가득 찼는지 확인합니다.
    public boolean isFull() {
        return num >= max;
    }
    // 집합을 초기화합니다. (모든 요소를 삭제)
    public void clear() {
        num = 0;
    }

    // 집합 s와의 합집합 구하기
    public boolean add(Q5_IntSortedSet s) {
        boolean flag = false;
        for (int i = 0; i < num; i++) {
            if (add(set[i]) == true) flag = true;
        }
        return flag;
    }
    // 집합 s와의 교집합 구하기
    public boolean retain(Q5_IntSortedSet s) {
        boolean flag = false;
        for (int i = 0; i < num; i++) {
            if (s.contains(set[i]) == false) {
                remove(set[i]);
                flag = true;
            }
        }
        return flag;
    }
    // 집합 s와의 차집합 구하기
    public boolean remove(Q5_IntSortedSet s) {
        boolean flag = false;
		for (int i = 0; i < num; i++) {
			if (s.contains(set[i]) == true) {
				remove(set[i]);
				flag = true;
			}
        }
		return flag;
    }

    // 집합 s의 부분집합인지 확인합니다.
    public boolean isSubsetOf(Q5_IntSortedSet s) {
		for (int i = 0; i < num; i++) {
			int j = 0;
			for (; j < s.num; j++)
				if (set[i] == s.set[j])
					break;
			if (j == s.num) // set[i]는 s에 포함되지 않음
				return false;
		}
		return true;
    }
    // 집합 s의 진부분집합인지 확인합니다.
    public boolean isProperSubsetOf(Q5_IntSortedSet s) {
		if (num >= s.num) return false; // 요소수가 s 이상이면 s의 진부분집합이 아님
		return s.isSubsetOf(s);
    }

    // 집합 s1과 s2의 교집합을 복사합니다.
    public void intersection(Q5_IntSortedSet s1, Q5_IntSortedSet s2) {
        clear();
        for (int i = 0; i < s1.num; i++) {
            if (s2.contains(s1.set[i])) add(s1.set[i]);
        }
    }
    // 집합 s1과 s2의 차집합을 복사합니다.
    public void differenceOf(Q5_IntSortedSet s1, Q5_IntSortedSet s2) {
        clear();
        for (int i = 0; i < s1.num; i++) {
            if (!s2.contains(s1.set[i])) add(s1.set[i]);
        }
    }
}
