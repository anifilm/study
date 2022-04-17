// 제네릭 클래스의 예
package chap03.section3;

public class GenericClassTester {
    // 제네릭 클래스의 파라미터를 T라고 작성합니다.
    static class GenericClass<T> {
        private T xyz;
        GenericClass(T t) {  // 생성자
            this.xyz = t;
        }
        T getXyz() {
            return xyz;  // xyz를 반환합니다.
        }
    }
    public static void main(String[] args) {
        // 다음과 같이 파라미터에 String을 넘길 수도 있고 Integer를 넘길 수도 있다.
        GenericClass<String> s = new GenericClass<>("ABC");
        GenericClass<Integer> n = new GenericClass<>(15);

        System.out.println(s.getXyz());
        System.out.println(n.getXyz());
    }
}
