// a부터 b까지 정수의 합 구하기 1
const {print, println} = require('./modules/print')
const range = require('./modules/range')
const input = require('prompt-sync')()

println('a부터 b까지의 합을 구합니다.')
let a = Number(input('정수 a를 입력하세요: '))
let b = Number(input('정수 b를 입력하세요: '))

if (a > b) {  // a와 b를 오름차순으로 정렬
  [a, b] = [b, a]  // 구조 분해 할당을 통한 값 스왑
}

let sum = 0;
for (let i of range(a, b + 1)) {  // b - a번 반복
  if (i < b)  // i가 b보다 작으면 합을 구하는 과정을 출력
    print(`${i} + `)
  else        // i가 b보다 크거나 같으면 최종값 출력을 위해 i =를 출력
    print(`${i} = `)
  sum += i;   // sum에 i를 더함
}
println(sum)
