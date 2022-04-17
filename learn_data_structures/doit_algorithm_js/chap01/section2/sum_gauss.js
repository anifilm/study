// 1부터 n까지의 합 구하기 3 (가우스 덧셈 방법)
const {print, println} = require('./modules/print')
const input = require('prompt-sync')()

println('1부터 n까지 정수의 합을 구합니다.')
let n = Number(input('n값을 입력하세요: '))

let sum = n * (n + 1) / 2

println(`1부터 ${n}까지의 합은 ${sum}입니다.`)
