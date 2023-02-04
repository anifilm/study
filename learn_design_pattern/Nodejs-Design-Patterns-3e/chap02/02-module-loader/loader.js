const fs = require('fs');

function loadModule(filename, module, require) {
  const wrappedSrc = `(function (module, exports, require) {
      ${fs.readFileSync(filename, 'utf8')}
    })(module, module.exports, require)`;
  eval(wrappedSrc);
}

require = function require(moduleName) {
  console.log(`Require invoked for module: ${moduleName}`);
  const id = require.resolve(moduleName);
  if (require.cache[id]) {
    return require.cache[id].exports;
  }

  // 모듈 메타데이터
  const module = {
    exports: {},
    id,
  };
  // 캐시 업데이트
  require.cache[id] = module;

  // 모듈 로드
  loadModule(id, module, require);

  // 익스포트되는 변수 반환
  return module.exports;
};

require.cache = {};
require.resolve = (moduleName) => {
  // 모듈 이름으로 id로 불리게 되는 모듈의 전체 경로를 찾아냄 (resolve)
  return originalRequire.resolve(moduleName);
};

require(process.argv[2]);
