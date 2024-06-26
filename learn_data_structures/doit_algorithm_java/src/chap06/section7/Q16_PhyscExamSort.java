/* Q16
실습 6-15의 배열 x를 키의 오름차순이 아니라 시력의 내림차순으로 정렬하는 프로그램을 작성하세요.
*/
package chap06.section7;
import java.util.Arrays;
import java.util.Comparator;

public class Q16_PhyscExamSort {
    // 신체검사 데이터
    static class PhyscData {
        String name;   // 이름
        int height;    // 키
        double vision; // 시력

        // 생성자
        PhyscData(String name, int height, double vision) {
            this.name = name;
            this.height = height;
            this.vision = vision;
        }

        // 신체검사 데이터를 문자열로 반환합니다.
        public String toString() {
            return name + " " + height + " " + vision;
        }

        // 키 오름 차순 comparator
        static final Comparator<PhyscData> HEIGHT_ORDER = new HeightOrderComparator();

        private static class HeightOrderComparator implements Comparator<PhyscData> {
            public int compare(PhyscData d1, PhyscData d2) {
                //return (d1.height > d2.height) ? 1 : (d1.height < d2.height) ? -1 : 0;
                return (d1.height < d2.height) ? 1 : (d1.height > d2.height) ? -1 : 0;
            }
        }
    }

    public static void main(String[] args) {
        PhyscData[] x = {
            new PhyscData("이나령", 162, 0.3),
            new PhyscData("전서현", 173, 0.7),
            new PhyscData("이수민", 175, 2.0),
            new PhyscData("홍준기", 171, 1.5),
            new PhyscData("유지훈", 168, 0.4),
            new PhyscData("이호연", 174, 1.2),
            new PhyscData("김한결", 169, 0.8),
        };

        // 배열 x를 HEIGHT_ORDER을 사용하여 정렬
        Arrays.sort(x, PhyscData.HEIGHT_ORDER);

        System.out.println("■ 신체검사 리스트 ■\n");
        System.out.println(" 이름      키   시력");
        System.out.println("--------------------");
        for (int i = 0; i < x.length; i++) {
            System.out.printf("%-8s%3d%5.1f\n", x[i].name, x[i].height, x[i].vision);
        }
        System.out.println();
    }
}
