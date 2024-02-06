package chap09.sorting;

import java.util.Random;

public class SortingDemo {
    static final int NUM_SCALE = 10000;
    static final int SIZE = 30;

    public static void prepare(int A[]) {
        for (int i = 0; i < A.length; i++) {
            A[i] = (int) (NUM_SCALE * Math.random());
        }
    }

    public void prepare_Gaussian(int A[]) {
        for (int i = 0; i < A.length; i++) {
            Random number = new Random();
            A[i] = (int) (NUM_SCALE * number.nextGaussian());
        }
    }

    public static void printA(int A[]) {
        for (int i = 0; i < A.length; i++) {
            System.out.print(A[i] + " ");
        }
        System.out.println();
    }

    public static void main(String[] args) {

        System.out.println("Sorting Demo!");

        //int[] A = new int[SIZE];
        //prepare(A); // 임의의 수 배열 생성

        int[] A = { 8, 31, 48, 73, 3, 65, 20, 29, 11, 15 };
        Sorting s = new Sorting(A);

        //s.selectionSort(); // 선택 정렬
        //s.bubbleSort();    // 버블 정렬
        //s.insertionSort(); // 삽입 정렬
        //s.mergeSort();     // 병합 정렬
        s.quickSort(); // 퀵 정렬

        printA(A); // 배열 출력
    }
}
