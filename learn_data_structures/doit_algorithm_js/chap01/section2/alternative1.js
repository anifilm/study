// +와 -를 번갈아 출력하기 1
const {print, println} = require('./modules/print')
const range = require('./modules/range')
const input = require('prompt-sync')()

println('+와 -를 번갈아 출력합니다.')
let n = Number(input('몇 개를 출력할까요?: '))

for (let i of range(n)) {  // 반복 n번
  if (i % 2)
    print('-')  // 홀수인 경우 - 출력
  else
    print('+')  // 짝수인 경우 + 출력
}
println()
