import React from 'react';
import { TodoProvider } from '../contexts/todo';
import TodoHeader from './TodoHeader';
import TodoInput from './TodoInput';
import TodoList from './TodoList';
import TodoFooter from './TodoFooter';

const Todos = () => {
  return (
    <TodoProvider>
      <TodoHeader />
      <TodoInput />
      <TodoList />
      <TodoFooter />
    </TodoProvider>
  );
};

export default Todos;
