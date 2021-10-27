import { combineReducers } from 'redux';
import { all } from 'redux-saga/effects';
import item, { itemSaga } from './item';
import loading from './loading';

// 루트 리듀서
const rootReducer = combineReducers({
  item,
  loading,
});

export function* rootSaga() {
  yield all([itemSaga]);
}

export default rootReducer;
