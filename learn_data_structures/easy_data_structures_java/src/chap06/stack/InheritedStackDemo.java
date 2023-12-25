package chap06.stack;

public class InheritedStackDemo {
    public static void main(String[] args) {

        System.out.println("Inherited Stack Demo!");

        InheritedStack<Integer> stack1 = new InheritedStack<>();
        // 또는 stack1 = new LinkedStack( );

        stack1.push(1);
        stack1.push(2);
        stack1.push(3);

        System.out.print("printAll(): ");
        stack1.printAll();

        stack1.popAll();

        System.out.println("isEmpty?:" + stack1.isEmpty());

        stack1.push(10);
        stack1.push(20);
        stack1.push(30);
        stack1.pop();
        stack1.push(40);

        System.out.print("printAll(): ");
        stack1.printAll();

        System.out.println("top: " + stack1.top());

        System.out.println("pop() " + stack1.pop());
        System.out.println("pop() " + stack1.pop());
        System.out.println("pop() " + stack1.pop());
        System.out.println("pop() " + stack1.pop());

        System.out.println("isEmpty?:" + stack1.isEmpty());
    }
}
