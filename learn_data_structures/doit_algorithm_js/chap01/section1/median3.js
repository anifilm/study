// 세 정수값을 입력받아 중앙값을 구하기 1
const {print, println} = require('./modules/print')
const input = require('prompt-sync')()

function med3(a, b, c) {
  /* a, b, c의 중앙값을 구하여 반환 */
  if (a >= b) {
    if (b >= c)
      return b
    else if (a <= c)
      return a
    else
      return c
  } else if (a > c)
    return a
  else if (b > c)
    return c
  else
    return b
}

println('세 정수의 중앙값을 구합니다.')
let a = Number(input('정수 a의 값을 입력하세요: '))
let b = Number(input('정수 b의 값을 입력하세요: '))
let c = Number(input('정수 c의 값을 입력하세요: '))

println(`중앙값은 ${med3(a, b, c)}입니다.`)
