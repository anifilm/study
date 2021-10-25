import React from 'react';
import { TodoConsumer } from '../contexts/todo';
import styles from '../Todo.module.css';
import TodoItem from './TodoItem';

const TodoList = () => {
  return (
    <TodoConsumer>
      {(value) => (
        <div className={styles.list}>
          {value.state.todos.map((todo) => {
            return (
              <TodoItem
                key={todo.id}
                todo={todo}
                onToggle={value.actions.onToggle}
                onRemove={value.actions.onRemove}
              />
            );
          })}
        </div>
      )}
    </TodoConsumer>
  );
};

export default TodoList;
