package chap06.stack;

public class PostfixEval {
    public static void main(String[] args) {
        String postfix = "700 3 47 + 6 * - 4 /";
        System.out.println("Input string: " + postfix);
        int answer = evaluate(postfix);
        System.out.println("Answer: " + answer);
    }

    private static int evaluate(String postfix) {
        int A, B;
        LinkedStack<Integer> s = new LinkedStack<>();
        boolean digitPreviously = false;
        for (int i = 0; i < postfix.length(); i++) {
            char ch = postfix.charAt(i);
            if (Character.isDigit(ch)) {
                if (digitPreviously == true) {
                    int tmp = s.pop();
                    tmp = 10 * tmp + (ch - '0');
                    s.push(tmp);
                } else {
                    s.push(ch - '0');
                }
                digitPreviously = true;
            } else if (isOperator(ch)) {
                A = s.pop();
                B = s.pop();
                int val = operation(A, B, ch);
                s.push(val);
                digitPreviously = false;
            } else {
                digitPreviously = false;
            }
        }
        return s.pop();
    }

    private static int operation(int a, int b, char ch) {
        int val = 0;
        switch (ch) {
            case '*':
                val = b * a;
                break;
            case '/':
                val = b / a;
                break;
            case '+':
                val = b + a;
                break;
            case '-':
                val = b - a;
                break;
        }
        return val;
    }

    private static boolean isOperator(char ch) {
        return ch == '+' || ch == '-' || ch == '*' || ch == '/';
    }
}
