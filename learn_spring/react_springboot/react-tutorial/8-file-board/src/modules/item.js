import { createAction, handleActions } from 'redux-actions';

// 상품 사가 함수 작성
export function* itemSaga() {
  //
}

// 초기 상태
const initialState = {
  item: null,
  items: [],
  error: null,
};

// 리듀서 함수 정의
const item = handleActions(
  { /*
    [FETCH_SUCCESS]: (state, action) => ({
      ...state,
      board: action.payload,
    }),
    [FETCH_FAILURE]: (state) => ({
      ...state,
    }),
    [FETCH_LIST_SUCCESS]: (state, action) => ({
      ...state,
      boards: action.payload,
    }),
    [FETCH_LIST_FAILURE]: (state, action) => ({
      ...state,
      error: action.payload,
    }), */
  },
  initialState,
);

export default item;
