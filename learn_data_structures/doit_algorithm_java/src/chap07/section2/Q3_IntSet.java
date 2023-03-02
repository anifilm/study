/* Q3
클래스 IntSet에 대해 집합 s의 부분집합인지를 판단하는 메서드, 집합 s의 진부분집합인지를 판단하는 메서드를 작성하세요. 판단 결과가 성립하면 true를, 그렇지 않으면 false를 반환하도록 하세요.
boolean isSubsetOf(IntSet s)       // 집합 s의 부분집합인지 확인합니다.
boolean isProperSubsetOf(IntSet s) // 집합 s의 진부분집합인지 확인합니다.
*/
package chap07.section2;

public class Q3_IntSet {
    private int max; // 집합의 최대 개수
    private int num; // 집합의 요소 개수
    private int[] set; // 집합 본체

    // 생성자
    public Q3_IntSet(int capacity) {
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

    // 집합에서 n을 검색합니다. (index 반환)
    public int indexOf(int n) {
        for (int i = 0; i < num; i++) {
            if (set[i] == n) return i; // 검색 성공
        }
        return -1; // 검색 실패
    }

    // 집합에 n이 있는지 없는지 확인합니다.
    public boolean contains(int n) {
        return (indexOf(n) != -1) ? true : false;
    }

    // 집합에 n을 추가합니다.
    public boolean add(int n) {
        if (num >= max || contains(n) == true) {
            return false; // 가득 찼거나 이미 존재합니다.
        }
        else {
            set[num++] = n; // 가장 마지막 자리에 추가합니다.
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
            set[idx] = set[--num]; // 마지막 요소를 삭제한 곳으로 옮깁니다.
            return true;
        }
    }

    // 집합 s에 복사합니다.
    public void copyTo(Q3_IntSet s) {
        int n = (s.max < num) ? s.max : num; // 복사할 요소 개수
        for (int i = 0; i < num; i++) {
            s.set[i] = set[i];
        }
        s.num = n;
    }

    // 집합 s를 복사합니다.
    public void copyFrom(Q3_IntSet s) {
        int n = (max < s.num) ? max : s.num; // 복사항 요소 개수
        for (int i = 0; i < n; i++) {
            set[i] = s.set[i];
        }
        num = n;
    }

    // 집합 s와 같은지 확인합니다.
    public boolean equalTo(Q3_IntSet s) {
        if (num != s.num) return false; // 요소 개수가 같지 않으면 집합도 같지 않습니다.
        for (int i = 0; i < num; i++) {
            int j = 0;
            for (; j < s.num; j++) {
                if (set[i] == s.set[i]) break;
            }
            if (j == s.num) return false; // set[i]는 s에 포함되지 않습니다.
        }
        return true;
    }

    // 집합 s1과 s2의 합집합을 복사합니다.
    public void unionOf(Q3_IntSet s1, Q3_IntSet s2) {
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
    public boolean add(Q3_IntSet s) {
        boolean flag = false;
        for (int i = 0; i < num; i++) {
            if (add(set[i]) == true) flag = true;
        }
        return flag;
    }
    // 집합 s와의 교집합 구하기
    public boolean retain(Q3_IntSet s) {
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
    public boolean remove(Q3_IntSet s) {
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
    public boolean isSubsetOf(Q3_IntSet s) {
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
    public boolean isProperSubsetOf(Q3_IntSet s) {
		if (num >= s.num) return false; // 요소수가 s 이상이면 s의 진부분집합이 아님
		return s.isSubsetOf(s);
    }
}
