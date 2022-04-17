// 정수형 난수 생성 함수
const getRandomInt = function (min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min
}

module.exports = getRandomInt
