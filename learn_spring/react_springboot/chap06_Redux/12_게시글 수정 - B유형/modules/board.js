import { createAction, handleActions } from 'redux-actions';

// 액션 타입 선언
const FETCH = 'board/FETCH';
const FETCH_SUCCESS = 'board/FETCH_SUCCESS';
const FETCH_FAILURE = 'baord/FETCH_FAILURE';
const FETCH_LIST = 'board/FETCH_LIST';
const FETCH_LIST_SUCCESS = 'board/FETCH_LIST_SUCCESS';
const FETCH_LIST_FAILURE = 'board/FETCH_LIST_FAILURE';
const CHANGE_TITLE = 'board/CHANGE_TITLE';
const CHANGE_CONTENT = 'board/CHANGE_CONTENT';

// 액션 생성 함수 정의
export const fetchStart = createAction(FETCH);
export const fetchSuccess = createAction(FETCH_SUCCESS, (data) => data);
export const fetchFailure = createAction(FETCH_FAILURE, (e) => e);
export const fetchListStart = createAction(FETCH_LIST);
export const fetchListSuccess = createAction(FETCH_LIST_SUCCESS, (data) => data);
export const fetchListFailure = createAction(FETCH_LIST_FAILURE, (e) => e);
export const changeTitle = createAction(CHANGE_TITLE, (title) => title);
export const changeContent = createAction(CHANGE_CONTENT, (content) => content);

// 초기 상태
const initialState = {
  loading: {
    FETCH: false,
    FETCH_LIST: false,
  },
  board: null,
  boards: [],
  error: null,
  // 제목, 내용 상태 선언
  title: '',
  content: '',
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
      // title, content 상태값 변경
      title: action.payload.title,
      content: action.payload.content,
    }),
    [FETCH_FAILURE]: (state) => ({
      ...state,
      loading: {
        ...state.loading,
        FETCH: false,
      },
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
    // 제목 변경 리듀서 함수 정의
    [CHANGE_TITLE]: (state, { payload: title }) => ({
      ...state,
      title,
    }),
    // 내용 변경 리듀서 함수 정의
    [CHANGE_CONTENT]: (state, { payload: content }) => ({
      ...state,
      content,
    }),
  },
  initialState,
);

export default board;
