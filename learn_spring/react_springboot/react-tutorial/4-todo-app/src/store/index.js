import { createStore } from 'redux';
import { composeWithDevTools } from 'redux-devtools-extension';

export default function configureStore(reducer) {
  return createStore(reducer, composeWithDevTools());
}
