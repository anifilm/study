import React from 'react';
import ReactDOM from 'react-dom';

import App from './App';

// 리덕스 관련 모듈 임포트
import { createStore } from 'redux';
import { Provider } from 'react-redux';
import todos from './modules/todos';
//import { composeWithDevToos } from 'redux-devtools-extension';

// 스토어 생성
const store = createStore(todos);

// 리덕스 적용
ReactDOM.render(
  <Provider store={store}>
    <App />
  </Provider>,
  document.getElementById('root')
);
