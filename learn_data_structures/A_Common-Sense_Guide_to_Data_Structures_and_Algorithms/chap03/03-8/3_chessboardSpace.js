// O(logN)
function chessboardSpace(numberOfGrains) {
  let chessboardSpace = 1;
  let placeGrains = 1;

  while (placeGrains < numberOfGrains) {
    placeGrains *= 2;
    chessboardSpace += 1;
  }

  return chessboardSpace;
}

console.log(chessboardSpace(15));
