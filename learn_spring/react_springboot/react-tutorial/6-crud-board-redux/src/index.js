import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';

import App from './App';

// 리덕스 관련 모듈 임포트
import { createStore } from 'redux';
import { Provider } from 'react-redux';
import board from './modules/board';
import { composeWithDevTools } from 'redux-devtools-extension';

// 스토어 생성
const store = createStore(board, composeWithDevTools());

// 리덕스 적용
ReactDOM.render(
  <Provider store={store}>
    <BrowserRouter>
      <App />
    </BrowserRouter>
  </Provider>,
  document.getElementById('root'),
);
