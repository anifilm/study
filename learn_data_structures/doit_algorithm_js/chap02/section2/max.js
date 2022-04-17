// 시퀀스 요소의 최대값 출력하기
const {print, println} = require('./modules/print')
const range = require('./modules/range')
const input = require('prompt-sync')()

function max_of(a){
  /* 시퀀스형 a 원소의 최대값을 반환 */
  max = a[0]
  for (let i of range(1, a.length)) {
    if (a[i] > max) max = a[i]
  }
  return max
}

println("배열의 최대값을 구합니다.")

const num = Number(input("요소 수를 입력하세요: "))
let x = new Array(num)

for (let i of range(num)) {
  x[i] = Number(input(`x[${i}]값을 입력하세요: `))
}

println(`최대값은 ${max_of(x)}입니다.`)
