// 세 정수를 입력받아 최대값 구하기
const {print, println} = require('./modules/print')
const input = require('prompt-sync')()

println('세 정수의 최대값을 구합니다.')
let a = Number(input('정수 a의 값을 입력하세요: '))
let b = Number(input('정수 b의 값을 입력하세요: '))
let c = Number(input('정수 c의 값을 입력하세요: '))

let max = a
if (b > max) max = b
if (c > max) max = c

println(`최대값은 ${max}입니다.`)
