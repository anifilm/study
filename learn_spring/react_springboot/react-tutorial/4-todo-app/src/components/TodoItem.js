import React from 'react';
import styles from '../Todo.module.css';

const TodoItem = () => {
  return (
    <div className={styles.item}>
      <input type="checkbox" />
      <span>todoItem</span>
      <button>삭제</button>
    </div>
  );
};

export default TodoItem;
