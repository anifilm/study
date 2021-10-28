import { createAction, handleActions } from 'redux-actions';
import { takeLatest, call, put } from 'redux-saga/effects';
import { startLoading, endLoading } from './loading';
import { fetchItemApi, fetchItemListApi } from '../lib/api';

// 액션 타입
const FETCH_SUCCESS = 'item/FETCH_SUCCESS';
const FETCH_FAILURE = 'item/FETCH_FAILURE';
const FETCH_LIST_SUCCESS = 'item/FETCH_LIST_SUCCESS';
const FETCH_LIST_FAILURE = 'item/FETCH_LIST_FAILURE';
// 상세 조회 액션 타입
export const FETCH_ITEM = 'item/FETCH_ITEM';
export const FETCH_ITEM_LIST = 'item/FETCH_ITEM_LIST';

// 액션 생성 함수
export const fetchSuccess = createAction(FETCH_SUCCESS, (data) => data);
export const fetchFailure = createAction(FETCH_FAILURE, (e) => e);
export const fetchListSuccess = createAction(FETCH_LIST_SUCCESS, (data) => data);
export const fetchListFailure = createAction(FETCH_LIST_FAILURE, (e) => e);
// 상세 조회 액션 생성 함수
export const fetchItem = createAction(FETCH_ITEM, (itemId) => itemId);
export const fetchItemList = createAction(FETCH_ITEM_LIST);

// 상품 상세 조회 태스크 작성
function* fetchItemSaga(action) {
  yield put(startLoading(FETCH_ITEM));
  try {
    const response = yield call(fetchItemApi, action.payload);
    yield put(fetchSuccess(response.data));
  } catch (e) {
    yield put(fetchFailure(e));
  }
  yield put(endLoading(FETCH_ITEM));
}
// 상품 목록 조회 태스크 작성
function* fetchItemListSaga(action) {
  yield put(startLoading(FETCH_ITEM_LIST));
  try {
    const response = yield call(fetchItemListApi);
    yield put(fetchListSuccess(response.data));
  } catch (e) {
    yield put(fetchListFailure(e));
  }
  yield put(endLoading(FETCH_ITEM_LIST));
}

export function* itemSaga() {
  // 상세 조회 태스크 수행
  yield takeLatest(FETCH_ITEM, fetchItemSaga);
  // 목록 조회 태스크 수행
  yield takeLatest(FETCH_ITEM_LIST, fetchItemListSaga);
}

// 초기 상태
const initialState = {
  item: null,
  items: [],
  error: null,
};

// 리듀서 함수 정의
const item = handleActions(
  {
    // 상세 조회 상태 변경
    [FETCH_SUCCESS]: (state, action) => ({
      ...state,
      item: action.payload,
    }),
    [FETCH_FAILURE]: (state, action) => ({
      ...state,
      error: action.payload,
    }),
    // 목록 조회 상태 변경
    [FETCH_LIST_SUCCESS]: (state, action) => ({
      ...state,
      items: action.payload,
    }),
    [FETCH_LIST_FAILURE]: (state, action) => ({
      ...state,
      error: action.payload,
    }),
  },
  initialState,
);

export default item;
