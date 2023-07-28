// O(1)
function median(array) {
  const middle = Math.floor(array.length / 2);

  // 배열에 짝수 개의 수가 있으면
  if (array.length % 2 === 0) {
    return (array[middle - 1] + array[middle]) / 2;
  } else { // 배열에 홀수 개의 수가 있으면
    return array[middle];
  }
}
