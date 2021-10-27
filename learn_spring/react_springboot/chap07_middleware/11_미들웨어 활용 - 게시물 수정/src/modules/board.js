import { createAction, handleActions } from "redux-actions";
import { fetchBoardApi, fetchBoardListApi } from '../lib/api';

// 액션 타입 선언
const FETCH = 'board/FETCH';
const FETCH_SUCCESS = 'board/FETCH_SUCCESS';
const FETCH_FAILURE = 'baord/FETCH_FAILURE';
const FETCH_LIST = 'board/FETCH_LIST';
const FETCH_LIST_SUCCESS = 'board/FETCH_LIST_SUCCESS';
const FETCH_LIST_FAILURE = 'board/FETCH_LIST_FAILURE';

// 액션 생성 함수 정의
export const fetchStart = createAction(FETCH);
export const fetchSuccess = createAction(FETCH_SUCCESS, (data) => data);
export const fetchFailure = createAction(FETCH_FAILURE, (e) => e);
export const fetchListStart = createAction(FETCH_LIST);
export const fetchListSuccess = createAction(FETCH_LIST_SUCCESS, (data) => data);
export const fetchListFailure = createAction(FETCH_LIST_FAILURE, (e) => e);

// 게시글 상세 조회 Thunk 생성 함수 정의
export const readBoardThunk = (boardNo) => {
  return async (dispatch) => {
    dispatch(fetchStart());
    try {
      const response = await fetchBoardApi(boardNo);
      dispatch(fetchSuccess(response.data));
    } catch (e) {
      dispatch(fetchFailure(e));
      throw e;
    }
  };
};
// 게시글 목록 조회 Thunk 생성 함수 정의
export const listBoardThunk = () => {
  return async (dispatch) => {
    dispatch(fetchListStart());
    try {
      const response = await fetchBoardListApi();
      dispatch(fetchListSuccess(response.data));
    } catch (e) {
      dispatch(fetchListFailure(e));
      throw e;
    }
  };
};

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
  {
    [FETCH]: (state) => ({
      ...state,
      loading: {
        ...state.loading,
        FETCH: true,
      },
    }),
    [FETCH_SUCCESS]: (state, action) => ({
      ...state,
      loading: {
        ...state.loading,
        FETCH: false,
      },
      board: action.payload,
    }),
    [FETCH_FAILURE]: (state, action) => ({
      ...state,
      loading: {
        ...state.loading,
        FETCH: false,
      },
      error: action.payload,
    }),
    // 목록 조회 리듀서 함수 정의
    [FETCH_LIST]: (state) => ({
      ...state,
      loading: {
        ...state.loading,
        FETCH_LIST: true,
      },
    }),
    [FETCH_LIST_SUCCESS]: (state, action) => ({
      ...state,
      loading: {
        ...state.loading,
        FETCH_LIST: false,
      },
      boards: action.payload,
    }),
    [FETCH_LIST_FAILURE]: (state, action) => ({
      ...state,
      loading: {
        ...state.loading,
        FETCH_LIST: false,
      },
      error: action.payload,
    }),
  },
  initialState,
);

export default board;
