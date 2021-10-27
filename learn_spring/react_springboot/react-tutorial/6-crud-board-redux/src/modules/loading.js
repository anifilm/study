import { createAction, handleActions } from 'redux-actions';

// 액션 타입
const START_LOADING = 'loading/START_LOADING';
const END_LOADING = 'loading/END_LOADING';

// 액션 생성 함수
export const startLoading = createAction(START_LOADING, (actionType) => actionType);
export const endLoading = createAction(END_LOADING, (actionType) => actionType);

// 초기 상태
const initialState = {};

// 리듀서 함수 정의
const loading = handleActions(
  {
    [START_LOADING]: (state, action) => ({
      ...state,
      [action.payload]: true,
    }),
    [END_LOADING]: (state, action) => ({
      ...state,
      [action.payload]: false,
    }),
  },
  initialState,
);

export default loading;
