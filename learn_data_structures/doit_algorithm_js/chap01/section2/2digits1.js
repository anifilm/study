// 2자리 양수(10 ~ 99) 입력받기
const {print, println} = require('./modules/print')
const input = require('prompt-sync')()

println('2자리 양수를 입력하세요.')

while (true) {
  var no = Number(input('값을 입력하세요: '))
  if (no >= 10 && no <= 99)
    break
}
println(`입력받은 양수는 ${no}입니다.`)
