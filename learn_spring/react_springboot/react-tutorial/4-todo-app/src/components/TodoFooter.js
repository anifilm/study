import React from 'react';
import styles from '../Todo.module.css';

const TodoFooter = ({ onClearAll }) => {
  return (
    <div className={styles.footer}>
      <button onClick={() => { onClearAll() }}>모두 삭제</button>
    </div>
  );
};

export default TodoFooter;
