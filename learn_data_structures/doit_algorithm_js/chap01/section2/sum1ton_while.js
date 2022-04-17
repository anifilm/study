// 1부터 n까지 정수의 합 구하기 1 (while 문)
const {print, println} = require('./modules/print')
const input = require('prompt-sync')()

println('1부터 n까지 정수의 합을 구합니다.')
let n = Number(input('n값을 입력하세요: '))

let sum = 0
let i = 1

while (i <= n) {  // i가 n보다 작거나 같은 동안 반복
  sum += i        // sum에 i를 더함
  i += 1;         // i에 1을 더함
}

println(`1부터 ${n}까지 정수의 합은 ${sum}입니다.`)
