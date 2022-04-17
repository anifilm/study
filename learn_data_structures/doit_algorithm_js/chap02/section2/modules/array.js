// 배열의 길이를 반환
const len = function (arr) {
  return arr.length
}

// 배열에서 가장 작은수를 반환
const min = function (arr) {
  let min = arr[0]
  for (let i = 1; i < arr.length; i++) {
    if (arr[i] < min) min = arr[i]
  }
  return min
}

// 배열에서 가장 큰수를 반환
const max = function (arr) {
  let max = arr[0]
  for (let i = 1; i < arr.length; i++) {
    if (arr[i] > max) max = arr[i]
  }
  return max
}

// 배열에서 요소의 합을 반환
const sum = function (arr) {
  let sum = 0
  for (let i = 0; i < arr.length; i++) {
    sum += arr[i]
  }
  return sum
}

module.exports = {
  len,
  min,
  max,
  sum,
}
