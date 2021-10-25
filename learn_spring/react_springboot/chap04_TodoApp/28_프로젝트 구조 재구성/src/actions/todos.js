import { createAction } from 'redux-actions';
import {
  CHANGE_TODO_INPUT,
  ADD_TODO,
  TOGGLE_TODO_STATUS,
  REMOVE_TODO,
  CLEAR_ALL_TODOS,
  RESTORE,
  CHANGE_FILTER,
  EDIT_TODO,
  SET_EDITING_ID,
  RESET_EDITING_ID,
} from '../constants/ActionTypes';

// createAction 함수 사용
export const changeTodoInput = createAction(CHANGE_TODO_INPUT, (input) => input);
export const addTodo = createAction(ADD_TODO, (input) => ({
  text: input,
  done: false,
}));
export const toggleTodoStatus = createAction(TOGGLE_TODO_STATUS, (id) => id);
export const removeTodo = createAction(REMOVE_TODO, (id) => id);
export const clearAllTodos = createAction(CLEAR_ALL_TODOS);
// 상태 복원 액션 생성 함수
export const restore = createAction(RESTORE, (data) => data);
// 필터링 유형 변경 액션 생성 함수
export const changeFilter = createAction(CHANGE_FILTER, (filter) => filter);
// Todo 항목 변경 액션 생성 함수
export const editTodo = createAction(EDIT_TODO, (id, input) => ({
  id,
  input,
}));
// 편집 항목 ID 설정 액션 생성 함수
export const setEditingId = createAction(SET_EDITING_ID, (id) => id);
// 편집 항목 ID 리셋 액션 생성 함수
export const resetEditingId = createAction(RESET_EDITING_ID);
