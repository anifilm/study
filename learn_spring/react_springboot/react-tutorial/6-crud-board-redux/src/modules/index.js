import { combineReducers } from 'redux';
import board from './board';
import loading from './loading';

// 루트 리듀서
const rootReducer = combineReducers({
  board,
  loading,
});

export default rootReducer;
