exports.loaded = false;

const a = require('./a');

module.exports = {
  a,
  loaded: true, // 이전 export문을 오버라이드
};
