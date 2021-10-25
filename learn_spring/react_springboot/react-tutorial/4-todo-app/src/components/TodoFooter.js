import React from 'react';
import styles from '../Todo.module.css';

const TodoFooter = () => {
  return (
    <div className={styles.footer}>
      <button>모두 삭제</button>
    </div>
  );
};

export default TodoFooter;
