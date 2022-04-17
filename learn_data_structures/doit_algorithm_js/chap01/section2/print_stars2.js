// *를 n개 출력하되 w개마다 줄바꿈하기 2
const {print, println} = require('./modules/print')
const range = require('./modules/range')
const input = require('prompt-sync')()

println('*를 출력합니다.')
let n = Number(input('몇 개를 출력할까요?: '))
let w = Number(input('몇 개마다 줄바꿈할까요?: '))

for (let i of range(n / w)) {  // n / w번 반복
  for (let j of range(w))
    print('*')
  println()
}

let rest = n % w
if (rest) {  // if문 판단 1번
  for (let j in range(rest))
    print('*')
  println()
}
