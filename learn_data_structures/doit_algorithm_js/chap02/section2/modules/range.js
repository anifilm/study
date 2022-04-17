// range 배열 생성 함수
const range = function (start, stop, step) {
  if (typeof stop == 'undefined') {
    // one param defined
    stop = start;
    start = 0;
  }

  if (typeof step == 'undefined') {
    step = 1;
  }

  if ((step > 0 && start >= stop) || (step < 0 && start <= stop)) {
    return [];
  }

  let arr = [];
  for (let i = start; step > 0 ? i < stop : i > stop; i += step) {
    arr.push(i);
  }

  return arr;
}

module.exports = range
