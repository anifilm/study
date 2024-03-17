-- 팩토리얼 함수 정의
function fact(n)
    if n == 0 then
        return 1
    else
        return n * fact(n - 1)
    end
end

print("enter a number:")
a = io.read("*n") -- 숫자 하나를 읽어 온다
print(fact(a))
