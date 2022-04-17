// 10~99 사이의 난수 n개 생성하기(13이 나오면 중단)
const getRandomInt = require('./modules/randomInt.js')
const {print, println} = require('./modules/print')
const range = require('./modules/range')
const input = require('prompt-sync')()

let n = Number(input('난수의 개수를 입력하세요: '))

for (let i of range(n)) {
  let r = getRandomInt(10, 99)
  print(r + ' ')
  if (r == 13) {
    println('\n프로그램을 중단합니다.')
    break
  }
}
println('\n난수 생성을 종료합니다.')
