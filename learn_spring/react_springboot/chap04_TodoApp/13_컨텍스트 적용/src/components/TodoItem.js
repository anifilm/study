import React from 'react';
import styles from '../Todo.module.css';

const TodoItem = ({ todo, onToggle, onRemove }) => {
  const { id, text, done } = todo;
  return (
    <div className={styles.item}>
      <input type="checkbox" checked={done} onChange={() => onToggle(id)} />
      <span>{text}</span>
      <button onClick={() => { onRemove(id) }}>삭제</button>
    </div>
  );
};

export default TodoItem;
