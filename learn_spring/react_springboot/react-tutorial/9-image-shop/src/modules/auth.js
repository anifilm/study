import { createAction, handleActions } from 'redux-actions';
import { takeLatest, call, put } from 'redux-saga/effects';
import * as api from '../lib/api';
import client from '../lib/client';

// 액션 타입
const SET_ACCESS_TOKEN = 'auth/SET_ACCESS_TOKEN';
const LOGIN = 'auth/LOGIN';

// 액션 생성 함수
export const setAccessToken = createAction(SET_ACCESS_TOKEN, (accessToken) => accessToken);
export const login = createAction(LOGIN, ({ userId, password }) => ({ userId, password }));

// 비동기 액션을 수행하는 태스크 작성
function* loginSaga(action) {
  try {
    const { userId, password } = action.payload;

    const response = yield call(api.signIn, userId, password);

    const { authorization } = response.headers;
    const accessToken = authorization.substring(7);

    yield put(setAccessToken(accessToken));

    client.defaults.headers.common.Authorization = `Bearer ${accessToken}`;
  }
  catch (e) {
    console.log(e);
  }
}

// 로그인 사가 함수 작성
export function* authSaga() {
  yield takeLatest(LOGIN, loginSaga);
}

// 초기 상태
const initialState = {
  accessToken: ''
};

// 리듀서 함수 정의
const auth = handleActions(
  {
    [SET_ACCESS_TOKEN]: (state, action) => ({
      ...state,
      accessToken: action.payload,
    }),
  },
  initialState,
);

export default auth;
