// 그 해 경과 일 수를 구함
package chap02.section2;
import java.util.Scanner;

class YMD {
    int year;  // 년
    int month; // 월(1~12)
    int day;   // 일(1~31)
    // 각 달의 일수
    static int[][] mdays = {
            {31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31},  // 평년
            {31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31},  // 윤년
    };
    // 서기 year년은 윤년인가? (윤년: 1/ 평년: 0)
    static int isLeap(int year) {
        return (year % 4 == 0 && year % 100 != 0 || year % 400 == 0) ? 1 : 0;
    }
    // 생성자 (주어진 날짜로 설정)
    public YMD(int year, int month, int day) {
        this.year = year;
        this.month = month;
        this.day = day;
    }
    // n일 이후의 날짜를 반환
    YMD after(int n) {
        YMD temp = new YMD(this.year, this.month, this.day);
        if (n < 0)
            return (before(-n));

        temp.day += n;
        while (temp.day > mdays[isLeap(temp.year)][temp.month-1]) {
            temp.day -= mdays[isLeap(temp.year)][temp.month-1];
            if (++temp.month > 12) {
                temp.year++;
                temp.month = 1;
            }
        }
        return temp;
    }
    // n일 이전의 날짜를 반환
    YMD before(int n) {
        YMD temp = new YMD(this.year, this.month, this.day);
        if (n < 0)
            return (after(-n));

        temp.day -= n;
        while (temp.day < 1) {
            if (--temp.month < 1) {
                temp.year--;
                temp.month = 12;
            }
            temp.day += mdays[isLeap(temp.day)][temp.month - 1];
        }
        return temp;
    }
}

public class Q11 {
    public static void main(String[] args) {
        Scanner stdIn = new Scanner(System.in);

        System.out.println("날짜를 입력하세요.");
        System.out.print("년: ");
        int year = stdIn.nextInt();
        System.out.print("월: ");
        int month = stdIn.nextInt();
        System.out.print("일: ");
        int day = stdIn.nextInt();

        YMD date = new YMD(year, month, day);

        System.out.print("몇 일 이전/이후의 날짜를 구할까요?：");
        int n = stdIn.nextInt();

        YMD d1 = date.after(n);
        System.out.printf("%d일 이후의 날짜는 %d년 %d월 %d일입니다.\n", n, d1.year, d1.month, d1.day);

        YMD d2 = date.before(n);
        System.out.printf("%d일 이전의 날짜는 %d년 %d월 %d일입니다.\n", n, d2.year, d2.month, d2.day);
    }
}
