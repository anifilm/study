Bun     JavaScript 런타임 및 패키지 관리, Typescript 지원
$ curl -fsSL https://bun.sh/install | bash
> scoop install main/bun
> powershell -c "irm bun.sh/install.ps1 | iex"

Julia   파이썬과 문법 비슷, 실행속도 빠르다.
$ (릴리즈 다운로드)
> scoop install main/julia
> winget install julia -s msstore

Mojo    파이썬의 슈퍼셋, 빌드후 실행속도 빠르다, Python 3.x와 100% 호환
$ curl -s https://get.modular.com | sh -
> 지원안함

Nim     파이썬과 문법 비슷
$ curl https://nim-lang.org/choosenim/init.sh -sSf | sh
$ sudo apt install nim
> scoop install main/nim

Odin    C언어의 대안으로 개발, Go와 문법 비슷
$ git clone https://github.com/odin-lang/Odin (후 빌드)
$ (릴리즈 다운로드)
> scoop install versions/odin (위치 오류있음, path 등록후 사용가능)

Onyx    Go & Odin과 문법 비슷, Wasmer를 사용한 크로스플랫폼 배포
$ sh <(curl https://get.onyxlang.io -sSfL)
> (릴리즈 다운로드 후 ONYX_PATH & PATH 등록)

Crystal 루비 문법을 차용
$ curl -fsSL https://crystal-lang.org/install.sh | sudo bash
$ sudo apt install crystal
$ pacman -S crystal shards
> scoop bucket add crystal-preview https://github.com/neatorobito/scoop-crystal
> scoop install vs_2022_cpp_build_tools crystal

Zig     C언어와 호환성을 중시, Rust와 문법 비슷. 개발자가 직접 메모리 관리. Bun 개발에 사용
$ (릴리즈 다운로드)
> scoop install main/zig
