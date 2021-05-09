; 피보나치 수 구하기

(defun fibo (n)
  (cond
    ((= n 1) 1)
    ((= n 2) 1)
    (t (+
      (fibo (- n 1)
      (fibo (- n 2)))))))

(fibo 10)
; 55
