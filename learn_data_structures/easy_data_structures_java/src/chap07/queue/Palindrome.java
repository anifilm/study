package chap07.queue;

import chap06.stack.LinkedStack;

public class Palindrome {
    private static boolean isPalindrom(String A) {
        LinkedStack s = new LinkedStack();
        LinkedQueue q = new LinkedQueue();

        for (int i = 0; i < A.length(); i++) {
            s.push(A.charAt(i)); // 문자열 A의 i번째 문자
            q.enqueue(A.charAt(i));
        }

        while (!s.isEmpty() && s.pop() == q.dequeue()) {
        }

        if (s.isEmpty()) {
            return true;
        } else {
            return false;
        }
    }

    public static void main(String[] args) {
        System.out.println("Palindrome Check!");
        String str = "lioninoil"; // 테스트 문자열
        boolean t = isPalindrom(str);
        System.out.println(str + " is Palindrome?: " + t);
    }
}
