// 1~12까지 8을 건너뛰고 출력하기 1
const {print, println} = require('./modules/print')
const range = require('./modules/range')

for (let i of range(1, 13) {
  if (i == 8) continue
  print(i + ' ')
}
println()
