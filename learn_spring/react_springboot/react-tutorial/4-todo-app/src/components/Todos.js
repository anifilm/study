import React, { useState, useRef } from 'react';
import TodoHeader from './TodoHeader';
import TodoInput from './TodoInput';
import TodoList from './TodoList';
import TodoFooter from './TodoFooter';

const Todos = () => {
  const [todos, setTodos] = useState([
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
  ]);

  // 로컬 변수 정의
  const nextId = useRef(4);
  // Todo 항목 추가 이벤트 처리
  const onInsert = (text) => {
    const todo = {
      id: nextId.current,
      text: text,
      done: false,
    };
    //setTodos(todos.concat(todo));
    setTodos((todos) => {
      return todos.concat(todo);
    });
    nextId.current += 1;
  };
  // 완료 체크 이벤트 처리
  const onToggle = (id) => {
    //setTodos(
    //  todos.map((todo) => {
    //    return todo.id === id ? { ...todo, done: !todo.done } : todo;
    //  }),
    //);
    setTodos((todos) => {
      return todos.map((todo) => {
        return todo.id === id ? { ...todo, done: !todo.done } : todo;
      });
    });
  };
  // Todo 항목 삭제 이벤트 처리
  const onRemove = (id) => {
    //setTodos(
    //  todos.filter((todo) => {
    //    return todo.id !== id;
    //  }),
    //);
    setTodos((todos) => {
      return todos.filter((todo) => {
        return todo.id !== id;
      });
    });
  };
  // Todo 완료 항목 모두 삭제 이벤트 처리
  const onClearAll = () => {
    //setTodos([]);
    //setTodos(() => { return []; }); // 항목 모두 삭제
    setTodos((todos) => {
      return todos.filter((todo) => {
        return !todo.done;
      });
    });
  };

  return (
    <div>
      <TodoHeader />
      <TodoInput onInsert={onInsert} />
      <TodoList todos={todos} onToggle={onToggle} onRemove={onRemove} />
      <TodoFooter onClearAll={onClearAll} />
    </div>
  );
};

export default Todos;
