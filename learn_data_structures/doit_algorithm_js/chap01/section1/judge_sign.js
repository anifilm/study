// 입력받은 정수값의 부호(양수, 음수, 0) 출력하기
const {print, println} = require('./modules/print')
const input = require('prompt-sync')()

let n = Number(input('정수를 입력하세요: '))

if (n > 0)
  println('이 수는 양수입니다.')
else if (n < 0)
  println('이 수는 음수입니다.')
else
  println('이 수는 0입니다.')
