import React from 'react';
import { TodoConsumer } from '../contexts/todo';
import styles from '../Todo.module.css';

const TodoInput = () => {
  return (
    <TodoConsumer>
      {(value) => (
        <div className={styles.input}>
          <form onSubmit={value.actions.onSubmit}>
            <input
              type="text"
              value={value.state.input}
              onChange={value.actions.onChange}
              placeholder="할 일을 입력하세요"
            />
            <button type="submit">추가</button>
          </form>
        </div>
      )}
    </TodoConsumer>
  );
};

export default TodoInput;
