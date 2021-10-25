import React, { useContext } from 'react';
import TodoContext from '../contexts/todo';
import styles from '../Todo.module.css';
import TodoItem from './TodoItem';

const TodoList = () => {
  const { state, actions } = useContext(TodoContext);
  return (
    <div className={styles.list}>
      {state.todos.map((todo) => {
        return (
          <TodoItem
            key={todo.id}
            todo={todo}
            onToggle={actions.onToggle}
            onRemove={actions.onRemove}
          />
        );
      })}
    </div>
  );
};

export default TodoList;
