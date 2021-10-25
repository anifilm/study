import React from 'react';
import styles from '../Todo.module.css';

const TodoFooter = ({ onClearAll }) => {
  return (
    <div className={styles.footer}>
      <button onClick={onClearAll}>완료 항목 삭제</button>
    </div>
  );
};

export default TodoFooter;
