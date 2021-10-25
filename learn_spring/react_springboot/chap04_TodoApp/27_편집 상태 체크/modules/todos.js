import { createAction, handleActions } from 'redux-actions';

// 액션 타입
const CHANGE_TODO_INPUT = 'CHANGE_TODO_INPUT';
const ADD_TODO = 'ADD_TODO';
const TOGGLE_TODO_STATUS = 'TOGGLE_TODO_STATUS';
const REMOVE_TODO = 'REMOVE_TODO';
const CLEAR_ALL_TODOS = 'CLEAR_ALL_TODOS';
const RESTORE = 'RESTORE'; // 상태 복원 액션 타입
const CHANGE_FILTER = 'CHANGE_FILTER'; // 필터링 유형 변경 액션 타입
const EDIT_TODO = 'EDIT_TIDO'; // Todo 항목 변경 액션 타입
const SET_EDITING_ID = 'SET_EDITING_ID'; // 편집 항목 ID 설정 액션 타입
const RESET_EDITING_ID = 'RESET_EDITING_ID'; // 편집 항목 ID 리셋 액션 타입

/* 액션 생성 함수
export const changeTodoInput = (input) => {
  return {
    type: CHANGE_TODO_INPUT,
    input: input,
  };
};
export const addTodo = (input) => {
  return {
    type: ADD_TODO,
    todo: {
      text: input,
      done: false,
    },
  };
};
export const toggleTodoStatus = (id) => {
  return {
    type: TOGGLE_TODO_STATUS,
    id: id,
  };
};
export const removeTodo = (id) => {
  return {
    type: REMOVE_TODO,
    id: id,
  };
};
export const clearAllTodos = () => {
  return {
    type: CLEAR_ALL_TODOS,
  };
};
*/
// createAction 함수 사용
export const changeTodoInput = createAction(
  CHANGE_TODO_INPUT,
  (input) => input,
);
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

// 초기 상태
const initialState = {
  input: '',
  todos: [
    {
      id: 1,
      text: 'todoItem1',
      done: true,
    },
    {
      id: 2,
      text: 'todoItem2',
      done: false,
    },
    {
      id: 3,
      text: 'todoItem3',
      done: false,
    },
  ],
  nextTodoId: 4,
  filter: 'ALL',
  editingId: 0,
};

/* 리듀서 함수 정의
function todos(state = initialState, action) {
  switch (action.type) {
    case CHANGE_TODO_INPUT:
      return {
        ...state,
        input: action.input,
      };
    case ADD_TODO:
      const newTodo = { ...action.todo, id: state.nextTodoId };
      state.nextTodoId += 1;
      return {
        ...state,
        todos: state.todos.concat(newTodo),
      };
    case TOGGLE_TODO_STATUS:
      return {
        ...state,
        todos: state.todos.map((todo) => {
          return todo.id === action.id ? { ...todo, done: !todo.done } : todo;
        }),
      };
    case REMOVE_TODO:
      return {
        ...state,
        todos: state.todos.filter((todo) => {
          return todo.id !== action.id;
        }),
      };
    case CLEAR_ALL_TODOS:
      return {
        ...state,
        todos: state.todos.filter((todo) => {
          return !todo.done;
        }),
      };
    default:
      return state;
  }
}
*/
// handleActions 함수 사용
const todos = handleActions(
  {
    [CHANGE_TODO_INPUT]: (state, { payload: input }) => ({
      ...state,
      input: input,
    }),
    [ADD_TODO]: (state, { payload: todo }) => {
      const newTodo = { ...todo, id: state.nextTodoId };
      const nextTodoId = state.nextTodoId + 1;

      return {
        ...state,
        todos: state.todos.concat(newTodo),
        nextTodoId,
      };
    },
    [TOGGLE_TODO_STATUS]: (state, { payload: id }) => ({
      ...state,
      todos: state.todos.map((todo) =>
        todo.id === id ? { ...todo, done: !todo.done } : todo,
      ),
    }),
    [REMOVE_TODO]: (state, { payload: id }) => ({
      ...state,
      todos: state.todos.filter((todo) => todo.id !== id),
    }),
    [CLEAR_ALL_TODOS]: (state, action) => ({
      ...state,
      todos: state.todos.filter((todo) => !todo.done),
    }),
    // 상태 복원 액션 처리
    [RESTORE]: (state, action) => {
      //console.log(action);
      //console.log(action.payload.todos);
      //console.log(action.payload.nextTodoId);
      return {
        ...state,
        todos: action.payload.todos,
        nextTodoId: action.payload.nextTodoId,
      };
    },
    // 필터링 유형 변경 액션 처리
    [CHANGE_FILTER]: (state, { payload: filter }) => ({
      ...state,
      filter: filter,
    }),
    // Todo 항목 변경 액션 처리
    [EDIT_TODO]: (state, action) => ({
      ...state,
      todos: state.todos.map((todo) =>
        todo.id === action.payload.id ? { ...todo, text: action.payload.input } : todo
      ),
    }),
    // 편집 항목 ID 설정
    [SET_EDITING_ID]: (state, { payload: id }) => ({
      ...state,
      editingId: id,
    }),
    // 편집 항목 ID 리셋
    [RESET_EDITING_ID]: (state) => ({
      ...state,
      editingId: 0,
    }),
  },
  initialState,
);

export default todos;
