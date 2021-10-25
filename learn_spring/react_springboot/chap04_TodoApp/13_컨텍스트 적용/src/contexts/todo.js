import React, { createContext, useState, useCallback, useRef } from 'react';

const TodoContext = createContext({
  state: {
    todos: [],
    input: '',
  },
  actions: {
    setTodos: () => {},
    onInsert: () => {},
    onRemove: () => {},
    onToggle: () => {},
    onClearAll: () => {},
    onChange: () => {},
    onSubmit: () => {},
  },
});

// 컨텍스트 공급자 정의
const TodoProvider = ({ children }) => {
  const todoItems = [
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
  ];

  // 상태 정의
  const [todos, setTodos] = useState(todoItems);
  const [input, setInput] = useState('');

  // 로컬 변수 정의
  const nextId = useRef(4);
  // Todo 항목 추가 이벤트 처리
  const onInsert = useCallback((text) => {
    const todo = {
      id: nextId.current,
      text: text,
      done: false,
    };
    setTodos((todos) => {
      return todos.concat(todo);
    });
    nextId.current += 1;
  }, []);
  // 완료 체크 이벤트 처리
  const onToggle = useCallback((id) => {
    setTodos((todos) => {
      return todos.map((todo) => {
        return todo.id === id ? { ...todo, done: !todo.done } : todo;
      });
    });
  }, []);
  // Todo 항목 삭제 이벤트 처리
  const onRemove = useCallback((id) => {
    setTodos((todos) => {
      return todos.filter((todo) => {
        return todo.id !== id;
      });
    });
  }, []);
  // Todo 완료 항목 모두 삭제 이벤트 처리
  const onClearAll = useCallback(() => {
    //setTodos(() => { return []; }); // 항목 모두 삭제
    setTodos((todos) => {
      return todos.filter((todo) => {
        return !todo.done;
      });
    });
  }, []);

  const onChange = useCallback((e) => {
    setInput(e.target.value);
  }, []);
  const onSubmit = useCallback((e) => {
    e.preventDefault();
    if (input.trim() === '') {
      alert('내용을 입력하세요.');
      setInput('');
      return;
    }
    onInsert(input.trim());
    setInput('');
  }, [onInsert, input]);

  // 상태(state)와 업데이트 함수(actions)를 묶어 value 객체 생성
  const value = {
    state: { todos, input },
    actions: {
      setTodos,
      onInsert,
      onToggle,
      onRemove,
      onClearAll,
      onChange,
      onSubmit,
    },
  };

  // value 속성값 설정
  return (
    <TodoContext.Provider value={value}>
      {children}
    </TodoContext.Provider>
  );
};

// TodoContext의 Consumer 속성을 TodoConsumer 변수에 저장
const { Consumer: TodoConsumer } = TodoContext;

// TodoProvider, TodoConsumer 내보내기
export { TodoProvider, TodoConsumer };

// TodoContext 내보내기
export default TodoContext;
