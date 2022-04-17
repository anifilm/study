// 구구단 곱셈표 출력하기
const {print, println} = require('./modules/print')
const range = require('./modules/range')

for (let i in range(66))
  print('-')
println()

for (let i of range(1, 10)) {  // 행 루프
  for (let j of range(1, 10))  // 열 루프
    print(`${i * j}\t`)
  println()  // 행 변경
}

for (let i in range(66))
  print('-')
println()


/*
TODO: 자바스크립트 템플릿 리터럴 출력 또는 포매팅 출력에 정렬 기능은 없을까?
*/
