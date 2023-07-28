// O(N)
function selectAString(array) {
  let newArray = [];

  for (let i = 0; i < array.length; i++) {
    if (array[i].startsWith("a")) {
      newArray.push(array[i]);
    }
  }

  return newArray;
}

console.log(selectAString(['apple', 'baboons', 'cribs', 'dulcimers']));
