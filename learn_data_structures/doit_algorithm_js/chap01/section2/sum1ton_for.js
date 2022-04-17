// 1부터 n까지의 합 구하기 2 (for 문)
const {print, println} = require('./modules/print')
const range = require('./modules/range')
const input = require('prompt-sync')()

println('1부터 n까지 정수의 합을 구합니다.')
let n = Number(input('n값을 입력하세요: '))

let sum = 0
for (let i of range(1, n + 1))
  sum += i;  // sum에 i를 더함

println(`1부터 ${n}까지 정수의 합은 ${sum}입니다.`)
