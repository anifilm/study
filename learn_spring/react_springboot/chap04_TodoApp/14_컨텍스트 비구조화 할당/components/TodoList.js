import React from 'react';
import { TodoConsumer } from '../contexts/todo';
import styles from '../Todo.module.css';
import TodoItem from './TodoItem';

const TodoList = () => {
  return (
    <TodoConsumer>
      {({ state, actions }) => (
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
      )}
    </TodoConsumer>
  );
};

export default TodoList;
