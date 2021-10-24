const list = [[1, 'hello'], [2, 'world'], [3, 'test']];

const map = new Map(list);

console.log(map);

console.log(map.get(1));

for (let key of map.keys()) {
  console.log(key);
}

for (let value of map.values()) {
  console.log(value);
}

for (let entry of map.entries()) {
  console.log(entry);
}

map.forEach(function (value, key, map) {
  console.log(key, ':', value);
})
