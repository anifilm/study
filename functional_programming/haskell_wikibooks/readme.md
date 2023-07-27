# 하스켈 설치하기
> choco install haskell-stack

# 하스켈 repl 설정
(.bashrc 추가)
alias ghci="stack repl"

또는
(window path 추가)
C:\Users\anifilm\AppData\Local\Programs\stack\x86_64-windows\ghc-9.4.5\bin


# 프로젝트 생성
> stack new [learn-haskell] new-template

# 빌드 및 실행
> cd learn-haskell
> stack build
> stack exec learn-haskell-exe
