import React from 'react';
import { TodoConsumer } from '../contexts/todo';
import styles from '../Todo.module.css';

const TodoFooter = () => {
  return (
    <TodoConsumer>
      {({ actions }) => (
        <div className={styles.footer}>
          <button onClick={() => { actions.onClearAll() }}>완료 항목 삭제</button>
        </div>
      )}
    </TodoConsumer>
  );
};

export default TodoFooter;
