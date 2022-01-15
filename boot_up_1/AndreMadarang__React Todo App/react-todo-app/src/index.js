import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './components/App';

import { Provider } from 'mobx-react';
import TodoStore from './store/TodoStore';

ReactDOM.render(
  <Provider TodoStore={TodoStore}>
    <App />
  </Provider>,
  document.getElementById('root')
);
