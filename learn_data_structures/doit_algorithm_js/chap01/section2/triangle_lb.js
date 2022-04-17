// 왼쪽 아래가 직각인 이등변 삼각형으로 * 출력하기
const {print, println} = require('./modules/print')
const range = require('./modules/range')
const input = require('prompt-sync')()

println('왼쪽 아래가 직각인 이등변 삼각형을 출력합니다.')
let n = Number(input('짧은 변의 길이를 입력하세요: '))

for (let i of range(n)) {      // 행 루프
  for (let j of range(i + 1))  // 열 루프
    print('*')
  println()
}
