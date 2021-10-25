import React from 'react';
import styles from '../Todo.module.css';
import TodoItem from './TodoItem';

const TodoList = () => {
  return (
    <div className={styles.list}>
      <TodoItem />
      <TodoItem />
      <TodoItem />
    </div>
  )
};

export default TodoList;
