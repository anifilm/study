import React from 'react';
import styles from '../Todo.module.css';
import TodoItem from './TodoItem';

const TodoList = ({ todos, onToggle, onRemove }) => {
  return (
    <div className={styles.list}>
      {todos.map((todo) => {
        return <TodoItem key={todo.id} todo={todo} onToggle={onToggle} onRemove={onRemove} />;
      })}
    </div>
  );
};

export default TodoList;
