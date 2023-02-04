exports.loaded = false;

const b = require('./b');

module.exports = {
  b,
  loaded: true, // 이전 export문을 오버라이드
};
