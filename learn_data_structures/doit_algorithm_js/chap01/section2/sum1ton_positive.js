// 1부터 n까지 정수의 합 구하기(n값은 양수만 입력받음)
const {print, println} = require('./modules/print')
const range = require('./modules/range')
const input = require('prompt-sync')()

println('1부터 n까지 정수의 합을 구합니다.')

while (true) {
  var n = Number(input('n값을 입력하세요: '))
  if (n > 0)  // n이 0보다 큰 수를 입력할 때까지 반복
    break
}

let sum = 0
for (let i of range(1, n + 1))
  sum += i  // sum에 i를 더함

println(`1부터 ${n}까지 정수의 합은 ${sum}입니다.`)
