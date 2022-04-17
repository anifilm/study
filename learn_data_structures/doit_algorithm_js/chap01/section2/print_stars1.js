// *를 n개 출력하되 w개마다 줄바꿈하기 1
const {print, println} = require('./modules/print')
const range = require('./modules/range')
const input = require('prompt-sync')()

println('*를 출력합니다.')
let n = Number(input('몇 개를 출력할까요?: '))
let w = Number(input('몇 개마다 줄바꿈할까요?: '))

for (let i of range(n)) {  // n번 반복
  print('*')
  if (i % w == w - 1)  // n번 판단
    println()  // 줄바꿈
}

if (n % w)
  println()  // 줄바꿈
