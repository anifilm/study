import { handleActions } from 'redux-actions';

// 초기 상태
const initialState = {
  loading: {
    FETCH: false,
    FETCH_LIST: false,
  },
  board: null,
  boards: [],
  error: null,
};

// 리듀서 함수 정의
const board = handleActions(
  {},
  initialState,
);

export default board;
