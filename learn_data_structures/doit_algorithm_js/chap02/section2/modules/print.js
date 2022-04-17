// 줄바꿈 없는 출력 함수
const print = function (p) {
  if (p != undefined)
    process.stdout.write(p)
  else
    process.stdout.write('')
}

// 줄바꿈 있는 출력 함수
const println = function (p) {
  if (p != undefined)
    console.log(p)
  else
    console.log('')
}

module.exports = {
  print,
  println,
}
